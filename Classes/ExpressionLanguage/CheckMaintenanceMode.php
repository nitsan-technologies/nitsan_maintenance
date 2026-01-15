<?php
namespace Nitsan\NitsanMaintenance\ExpressionLanguage;

use Doctrine\DBAL\Exception;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\ExpressionLanguage\AbstractProvider;

class CheckMaintenanceMode extends AbstractProvider
{
    /**
     * @throws Exception
     */
    public function __construct(
    )
    {
        $this->expressionLanguageVariables = [
            'CheckMaintenanceMode' => $this->checkWhitelistIp(),
        ];
    }

    /**
     * @param bool $returnTrueFalse
     * @return bool
     * @throws Exception
     */
    public function checkWhitelistIp(bool $returnTrueFalse = true): bool
    {
        $queryBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)
            ->getQueryBuilderForTable('tx_nitsanmaintenance_domain_model_maintenance');

        $queryBuilder
            ->select('*')
            ->from('tx_nitsanmaintenance_domain_model_maintenance');            
            $queryBuilder->where(
                $queryBuilder->expr()->eq('pid', $queryBuilder->createNamedParameter($this->getStoragePageId(), \Doctrine\DBAL\ParameterType::INTEGER))
            );
            $setting = $queryBuilder->executeQuery()->fetchAllAssociative();
        $setting[0] = $setting[0] ?? null;
        $settings = $setting[0];

        if ($settings === null) {
            $returnTrueFalse = false;
        } elseif ($settings['hide'] == 1) {
            $returnTrueFalse = false;
        }

        $settings['whitelist'] = $settings['whitelist'] ?? '';
        $ips = GeneralUtility::trimExplode(',', $settings['whitelist']);
        foreach ($ips as $ip) {
            if (!empty($ip)) {
                if (strstr(getenv('REMOTE_ADDR'), trim($ip))) {
                    $returnTrueFalse = false;
                }
            }
        }

        $_GET['pageid'] = $_GET['pageid'] ?? '';
        $mode = isset($GLOBALS['BE_USER']) ? 'BE' : 'FE';
        if ($mode === 'FE' && $_GET['pageid']) {
            $result = $queryBuilder
                ->select('*')
                ->from('tx_nitsanmaintenance_domain_model_maintenance')
                ->where(
                    $queryBuilder->expr()->eq('pagelink', $_GET['pageid'])
                )
                ->executeQuery()
                ->fetchAssociative();
            if(!empty($result)){
                $returnTrueFalse = false;
            }
        }
        return $returnTrueFalse;
    }

    public function getStoragePageId(){
        $storagePid = 0;

        if(isset($GLOBALS['TSFE'])){
            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_template');
            $queryBuilder->getRestrictions()->removeAll();
            $pageRecord = $queryBuilder
            ->select('uid', 'is_siteroot')
            ->from('pages')
            ->where(
                $queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($GLOBALS['TSFE']->id, \Doctrine\DBAL\ParameterType::INTEGER))
            )
            ->executeQuery()
            ->fetchAssociative();

            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_template');
            $templateRecord = $queryBuilder
            ->select('constants')
            ->from('sys_template')
            ->where(
                $queryBuilder->expr()->eq('pid', $queryBuilder->createNamedParameter($GLOBALS['TSFE']->id, \Doctrine\DBAL\ParameterType::INTEGER))
            )
            ->executeQuery()
            ->fetchAssociative();

            if (!$templateRecord) {
                foreach ($GLOBALS['TSFE']->rootLine as $key => $value) {
                    $templateRecord = $queryBuilder
                    ->select('constants')
                    ->from('sys_template')
                    ->where(
                        $queryBuilder->expr()->eq('pid', $queryBuilder->createNamedParameter($value['uid'], \Doctrine\DBAL\ParameterType::INTEGER))
                    )
                    ->executeQuery()
                    ->fetchAssociative();
                    if ($templateRecord) {
                        break;
                    }              
                }
            }
            
            if(isset($templateRecord['constants']) &&  $templateRecord['constants']!=''){
                preg_match('/module\.tx_nitsanmaintenance_maintenance\.persistence\.storagePid\s*=\s*(\d+)/', $templateRecord['constants'], $matches);

                if($pageRecord['is_siteroot']!=1){
                    $storagePid = $matches[1] ?? 0;
          
                }
            }

        }
        return (int)$storagePid;
    }

}

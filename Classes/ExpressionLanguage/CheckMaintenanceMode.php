<?php
namespace Nitsan\NitsanMaintenance\ExpressionLanguage;

use TYPO3\CMS\Core\ExpressionLanguage\AbstractProvider;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class CheckMaintenanceMode extends AbstractProvider
{
    public function __construct()
    {
        $returnTrueFalse = true;
       
        $queryBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)
            ->getQueryBuilderForTable('tx_nitsanmaintenance_domain_model_maintenance');

        $setting = $queryBuilder
            ->select('*')
            ->from('tx_nitsanmaintenance_domain_model_maintenance')
            ->execute()
            ->fetchAll();
        $setting[0] = isset($setting[0]) ? $setting[0] : null;
        $settings = $setting[0];
        
        if ($settings === null) {
            $returnTrueFalse = false;
        } elseif ($settings['hide'] == 1) {
            $returnTrueFalse = false;
        }

        $this->expressionLanguageVariables = [
            'CheckMaintenanceMode' => $returnTrueFalse,
        ];
        /* $this->expressionLanguageProviders = [
            UtilitiesConditionFunctionsProvider::class,
            SomeOtherConditionFunctionsProvider::class,
            AThirdConditionFunctionsProvider::class,
        ]; */
    }
}

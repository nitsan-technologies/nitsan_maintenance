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
    public function __construct()
    {
        $returnTrueFalse = true;

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('tx_nitsanmaintenance_domain_model_maintenance');

        $setting = $queryBuilder
            ->select('*')
            ->from('tx_nitsanmaintenance_domain_model_maintenance')
            ->executeQuery()
            ->fetchAllAssociative();
        $setting[0] = $setting[0] ?? null;
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

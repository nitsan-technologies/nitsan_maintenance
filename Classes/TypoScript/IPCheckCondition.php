<?php
namespace Nitsan\NitsanMaintenance\TypoScript;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * IPCheck condition
 */
class IPCheckCondition extends \TYPO3\CMS\Core\Configuration\TypoScript\ConditionMatching\AbstractCondition
{

    /**
     * Evaluate condition
     *
     * @param array $conditionParameters
     * @return bool
     */
    public function matchCondition(array $conditionParameters)
    {
        if (TYPO3_MODE === 'BE') {
            return true;
        }

        // For lower version from TYPO3 9
        if (version_compare(TYPO3_branch, '9.0', '<')) {
            $settingsRes = $GLOBALS['TYPO3_DB']->exec_SELECTquery("*", "tx_nitsanmaintenance_domain_model_maintenance", 'hidden!=1 and deleted!=1');
            $settings = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($settingsRes);
        } else {
            $queryBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)
                ->getQueryBuilderForTable('tx_nitsanmaintenance_domain_model_maintenance');

            $setting = $queryBuilder
                ->select('*')
                ->from('tx_nitsanmaintenance_domain_model_maintenance')
                ->execute()
                ->fetchAll();
            $settings = $setting[0];
        }

        if ($settings === null) {
            return false;
        } else if ($settings['hide'] == 1) {
            return false;
        }

        $ips = explode(",", $settings['whitelist']);
        foreach ($ips as $ip) {
            if (!empty($ip)) {
                if (strstr(getenv('REMOTE_ADDR'), trim($ip))) {
                    return false;
                }
            }
        }
        return true;
    }
}

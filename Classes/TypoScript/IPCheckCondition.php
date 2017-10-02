<?php
namespace Nitsan\NitsanMaintenance\TypoScript;

/**
 * IPCheck condition
 */
class IPCheckCondition extends \TYPO3\CMS\Core\Configuration\TypoScript\ConditionMatching\AbstractCondition {

    /**
     * Evaluate condition
     *
     * @param array $conditionParameters
     * @return bool
     */
    public function matchCondition(array $conditionParameters) {
        if (TYPO3_MODE === 'BE') {
                return TRUE;
        }
        $settingsRes = $GLOBALS['TYPO3_DB']->exec_SELECTquery("*", "tx_nitsanmaintenance_domain_model_maintenance", 'hidden!=1 and deleted!=1');
        $settings = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($settingsRes);
        $ips = explode(",", $settings['whitelist']);
        foreach($ips as $ip){
            if (strstr(getenv('REMOTE_ADDR'), trim($ip))) {
                return FALSE;
            }
        }
        return TRUE;
    }
}


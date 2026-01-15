<?php

namespace Nitsan\NitsanMaintenance;

use NITSAN\NsLicense\Service\LicenseService;
use TYPO3\CMS\Core\Package\PackageManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Setup
 */
class Setup {
	public function executeOnSignal($extname = null): void
    {
	 	if (is_object($extname)) {
             $extname = $extname->getPackageKey();
         }

	 	if ($extname === 'nitsan_maintenance') {
	 		// Let's check license system
             $activePackages = GeneralUtility::makeInstance(PackageManager::class)->getActivePackages();
             $isLicenseCheck = false;
             foreach ($activePackages as $key => $value) {
                 if ($key == 'ns_license') {
                     $isLicenseCheck = true;
                 }
             }
             if($isLicenseCheck) {
                 $nsLicenseModule = GeneralUtility::makeInstance(LicenseService::class);
                 $nsLicenseModule->connectToServer($extname, 0);
             }
	 	}
	}
}

<?php

namespace Nitsan\NitsanMaintenance\EventListener;

use TYPO3\CMS\Core\Package\PackageManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use NITSAN\NsLicense\Service\LicenseService;
use TYPO3\CMS\Core\Authentication\Event\AfterUserLoggedInEvent;

/**
 *
 * BackendUserLogin
 */
class BackendUserLogin {

	public function dispatch(AfterUserLoggedInEvent $backendUser): void
    {
		// Let's check license system
		$isLicenseActivate = GeneralUtility::makeInstance(PackageManager::class)->isPackageActive('ns_license');

		if ($isLicenseActivate) {
			$nsLicenseModule = GeneralUtility::makeInstance(LicenseService::class);
			$nsLicenseModule->connectToServer('nitsan_maintenance', 0);
		}
	}
}

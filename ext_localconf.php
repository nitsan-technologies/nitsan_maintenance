<?php

use Nitsan\NitsanMaintenance\Controller\MaintenanceController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}
ExtensionUtility::configurePlugin(
    'nitsan_maintenance',
    'Mode',
    [
        MaintenanceController::class => 'page , subscriber',
    ],
    [
        MaintenanceController::class => 'page , subscriber',
    ]
);

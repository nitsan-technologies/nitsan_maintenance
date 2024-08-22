<?php

if (!defined('TYPO3')) {
    die('Access denied.');
}
$_EXTKEY = 'nitsan_maintenance';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    $_EXTKEY,
    'Mode',
    [
        \Nitsan\NitsanMaintenance\Controller\MaintenanceController::class => 'page',
    ],
    // non-cacheable actions
    [
        \Nitsan\NitsanMaintenance\Controller\MaintenanceController::class => 'page',
    ]
);


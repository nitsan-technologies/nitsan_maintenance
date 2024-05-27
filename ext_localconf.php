<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}
$_EXTKEY = 'nitsan_maintenance';

//@extensionScannerIgnoreLine
if (version_compare(TYPO3_branch, '11.0', '>=')) {
    $moduleClass = \Nitsan\NitsanMaintenance\Controller\MaintenanceController::class;
} else {
    $moduleClass = 'Maintenance';
}



\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Nitsan.' . $_EXTKEY,
    'Mode',
    [
        $moduleClass => 'list, new, create',

    ],
    // non-cacheable actions
    [
         $moduleClass => 'list, new, create',

    ]
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter('Nitsan\\NitsanMaintenance\\Property\\TypeConverter\\UploadedFileReferenceConverter');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter('Nitsan\\NitsanMaintenance\\Property\\TypeConverter\\ObjectStorageConverter');

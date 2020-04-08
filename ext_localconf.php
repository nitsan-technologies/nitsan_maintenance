<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}
$_EXTKEY = 'nitsan_maintenance';
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Nitsan.' . $_EXTKEY,
    'Mode',
    [
        'Maintenance' => 'list, new, create',

    ],
    // non-cacheable actions
    [
        'Maintenance' => 'list, new, create',

    ]
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter('Nitsan\\NitsanMaintenance\\Property\\TypeConverter\\UploadedFileReferenceConverter');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter('Nitsan\\NitsanMaintenance\\Property\\TypeConverter\\ObjectStorageConverter');

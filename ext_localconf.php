<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Nitsan.' . $_EXTKEY,
    'Mode',
    array(
        'Maintenance' => 'list, new, create',

    ),
    // non-cacheable actions
    array(
        'Maintenance' => 'list, new, create',

    )
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter('Nitsan\\NitsanMaintenance\\Property\\TypeConverter\\UploadedFileReferenceConverter');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter('Nitsan\\NitsanMaintenance\\Property\\TypeConverter\\ObjectStorageConverter');
<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}
$_EXTKEY = 'nitsan_maintenance';
if (TYPO3_MODE === 'BE') {
    /**
     * Registers a Backend Module
     */
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Nitsan.' . $_EXTKEY,
        'web', // Make module a submodule of 'web'
        'maintenance', // Submodule key
        '', // Position
        [
            'Maintenance' => 'list, new, create',
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/Extension.svg',
            'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_maintenance.xlf',
        ]
    );
}

//# Add page TSConfig
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nitsan_maintenance/Configuration/TypoScript/TsConfig/pageTsConfig.ts"/>');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nitsanmaintenance_domain_model_maintenance', 'EXT:nitsan_maintenance/Resources/Private/Language/locallang_csh_tx_nitsanmaintenance_domain_model_maintenance.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nitsanmaintenance_domain_model_maintenance');

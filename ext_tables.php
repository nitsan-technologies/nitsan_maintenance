<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}
$_EXTKEY = 'nitsan_maintenance';

//# Add page TSConfig
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nitsan_maintenance/Configuration/TypoScript/TsConfig/pageTsConfig.typoscript"/>');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nitsanmaintenance_domain_model_maintenance', 'EXT:nitsan_maintenance/Resources/Private/Language/locallang_csh_tx_nitsanmaintenance_domain_model_maintenance.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nitsanmaintenance_domain_model_maintenance');

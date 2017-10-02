<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Nitsan.' . $_EXTKEY,
	'Mode',
	'NITSAN Maintenance Mode'
);

if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'Nitsan.' . $_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'maintenance',	// Submodule key
		'',						// Position
		array(
			'Maintenance' => 'list, new, create',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_maintenance.xlf',
		)
	);

}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'NITSAN Maintenance');

//# Add page TSConfig

		

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nitsan_maintenance/Configuration/TypoScript/TsConfig/pageTsConfig.ts"/>');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nitsanmaintenance_domain_model_maintenance', 'EXT:nitsan_maintenance/Resources/Private/Language/locallang_csh_tx_nitsanmaintenance_domain_model_maintenance.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nitsanmaintenance_domain_model_maintenance');

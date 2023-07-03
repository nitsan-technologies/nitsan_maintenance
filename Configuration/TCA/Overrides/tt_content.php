<?php

defined('TYPO3') or die();

/***************
 * Plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'nitsan_maintenance',
    'Mode',
    'NITSAN Maintenance Mode'
);

$GLOBALS['TCA']['tx_nitsanmaintenance_domain_model_maintenance']['ctrl']['security']['ignorePageTypeRestriction'] = true;
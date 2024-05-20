<?php

defined('TYPO3_MODE') or die();

$_EXTKEY = 'nitsan_maintenance';

/***************
 * Plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Nitsan.' . $_EXTKEY,
    'Mode',
    'Maintenance Mode'
);

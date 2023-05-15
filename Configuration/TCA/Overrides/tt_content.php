<?php

defined('TYPO3') or die();

$_EXTKEY = 'nitsan_maintenance';

/***************
 * Plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    $_EXTKEY,
    'Mode',
    'NITSAN Maintenance Mode'
);

<?php

defined('TYPO3') || die('Access denied.');

$extKey = 'nitsan_maintenance';

// Adding fields to the tt_content table definition in TCA
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Maintenance');
  
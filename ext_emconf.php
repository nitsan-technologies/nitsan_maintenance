<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => '[NITSAN] Maintenance Mode',
    'description' => 'Do you want to make your site temporary offline like Coming soon, Maintenance Mode? This extension will help you with simple plug & play which have special TYPO3 Page & Template. It would be useful on criteria like to set Site Coming Soon Page, Maintanance of Site, Offline while Upgrading your site etc.,',
    'category' => 'plugin',
    'author' => 'T3:Bhavin Barad, T3:Keval Pandya, QA:Siddharth Sheth',
	'author_email' => 'sanjay@nitsan.in',
	'author_company' => 'NITSAN Technologies Pvt Ltd',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '2.0.1',
    'constraints' => array(
        'depends' => array(
            'typo3' => '6.2.0-9.5.99',
        ),
        'conflicts' => array(
        ),
        'suggests' => array(
        ),
    ),
    'clearcacheonload' => false,
);

<?php

$EM_CONF[$_EXTKEY] = [
    'title' => '[NITSAN] Maintenance Mode',
    'description' => 'Do you want to make your site temporary offline like coming soon and maintenance mode? This extension will help you with simple plug & play to your TYPO3 instance. Demo: https://demo.t3terminal.com/t3t-extensions/maintenance-mode/ You can download PRO version for more-features & free-support at https://t3terminal.com/nitsan-maintenance-pro/',
    'category' => 'plugin',
    'author' => 'T3:Nilesh Malankiya, T3:Keval Pandya, QA:Siddharth Sheth',
    'author_email' => 'sanjay@nitsan.in',
    'author_company' => 'NITSAN Technologies Pvt Ltd',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '4.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '6.2.0-10.9.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'clearcacheonload' => false,
];

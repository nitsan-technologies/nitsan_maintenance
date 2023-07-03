<?php

$EM_CONF['nitsan_maintenance'] = [
    'title' => '[NITSAN] Maintenance Mode',
    'description' => 'Do you want to make your site temporary offline like coming soon and maintenance mode? This extension will help you with simple plug & play to your TYPO3 instance. Demo: https://demo.t3terminal.com/t3t-extensions/maintenance-mode/ You can download PRO version for more-features & free-support at https://t3planet.com/typo3-maintenance-mode-extension',
    'category' => 'plugin',
    'author' => 'Team NITSAN',
    'author_email' => 'sanjay@nitsan.in',
    'author_company' => 'NITSAN Technologies Pvt Ltd',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'version' => '12.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.0.0-12.4.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'clearcacheonload' => false,
];

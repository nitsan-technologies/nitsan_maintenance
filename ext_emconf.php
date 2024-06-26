<?php

$EM_CONF['nitsan_maintenance'] = [
    'title' => 'Maintenance Mode',
    'description' => 'This TYPO3 Maintenance extension will help you with simple plug & play which have a special TYPO3 Page & TYPO3 Template. It would be useful on criteria like to set Site Coming to Soon Page, Maintenance of Site, Offline while Upgrading your site, etc.

	*** Live Demo: https://demo.t3planet.com/t3-extensions/maintenance *** Premium Version, Documentation & Free Support: https://t3planet.com/typo3-maintenance-mode-extension',
    'category' => 'plugin',
    'author' => 'T3: Himanshu Ramavat, QA: Krishna Dhapa',
    'author_email' => 'sanjay@nitsan.in',
    'author_company' => 'T3Planet // NITSAN',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'version' => '12.1.0',
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

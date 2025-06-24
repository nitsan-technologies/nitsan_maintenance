<?php

$EM_CONF['nitsan_maintenance'] = [
    'title' => 'TYPO3 Maintenance Mode Extension',
    'description' => 'A simple plug & play TYPO3 extension to display a custom maintenance or coming soon page while your site is offline for updates, redesign, or launch preparation.',

    'category' => 'plugin',
    'author' => 'Team T3Planet',
    'author_email' => 'info@t3planet.de',
    'author_company' => 'T3Planet',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'version' => '13.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.0.0-13.9.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'clearcacheonload' => false,
];

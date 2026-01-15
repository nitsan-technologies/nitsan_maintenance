<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_subscriber',
        'label' => 'subscriber_email',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'dividers2tabs' => true,
        'versioningWS' => 2,
        'versioning_followPages' => true,
        'languageField' => 'sys_language_uid',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'subscriber_email',
        'iconfile' => 'EXT:nitsan_maintenance/Resources/Public/Icons/tx_nitsanmaintenance_domain_model_maintenance.gif',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_diffsource, hidden;;1,subscriber_email,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,'],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.allLanguages',
                        -1,
                        'flags-multiple',
                    ],
                ],
                'default' => 0,
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],

        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],

        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],

        'subscriber_email' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_subscriber.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
    ],
];

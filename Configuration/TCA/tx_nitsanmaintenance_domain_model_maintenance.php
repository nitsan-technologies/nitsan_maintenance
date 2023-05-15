<?php
$imageSettingsFalMedia = [
    'behaviour' => [
        'allowLanguageSynchronization' => true,
    ],
    'appearance' => [
        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
    ],
    'foreign_match_fields' => [
        'fieldname' => 'image',
        'tablenames' => 'tx_nitsanmaintenance_domain_model_maintenance',
    ],
    // custom configuration for displaying fields in the overlay/reference table
    // to use the newsPalette and imageoverlayPalette instead of the basicoverlayPalette
    'overrideChildTca' => [
        'types' => [
            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                'showitem' => '
                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
            ],
            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                'showitem' => '
                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
            ],
            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                'showitem' => '
                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
            ],
            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                'showitem' => '
                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
            ],
            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                'showitem' => '
                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
            ]
        ],
    ],
];

$imageConfigurationFalMedia = [
    'type' => 'file',
    'appearance' => $imageSettingsFalMedia['appearance'],
    'foreign_match_fields' => $imageSettingsFalMedia['foreign_match_fields'],
    'behaviour' => $imageSettingsFalMedia['behaviour'],
    'overrideChildTca' => $imageSettingsFalMedia['overrideChildTca'],
    'allowed' => 'common-image-types',
];
return [
    'ctrl' => [
        'title' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'versioningWS' => 2,
        'versioning_followPages' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,heading,text,countdown,fontcolor,footertext,fblink,twlink,linkedinlink,gitlink,',
        'iconfile' => 'EXT:nitsan_maintenance/Resources/Public/Icons/tx_nitsanmaintenance_domain_model_maintenance.gif',
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden,  hide, title, heading, text, countdown, whitelist, fontcolor, footertext, fblink, twlink, linkedinlink, gitlink',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, hide, title, heading, text;;;richtext:rte_transform[mode=ts_links], countdown,  endtime, whitelist, fontcolor, footertext;;;richtext:rte_transform[mode=ts_links], fblink, twlink, linkedinlink, gitlink, image, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,  endtime'],
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
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_nitsanmaintenance_domain_model_maintenance',
                'foreign_table_where' => 'AND tx_nitsanmaintenance_domain_model_maintenance.pid=###CURRENT_PID### AND tx_nitsanmaintenance_domain_model_maintenance.sys_language_uid IN (-1,0)',
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
        'hide' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.hide',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.enddate',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                ],
            ],
        ],

        'title' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'heading' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.heading',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'text' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.text',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'wizards' => [
                    'RTE' => [
                        'icon' => 'wizard_rte2.gif',
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'module' => [
                            'name' => 'wizard_rich_text_editor',
                            'urlParameters' => [
                                'mode' => 'wizard',
                                'act' => 'wizard_rte.php',
                            ],
                        ],
                        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                        'type' => 'script',
                    ],
                ],
            ],
        ],
        'footertext' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.footertext',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'wizards' => [
                    'RTE' => [
                        'icon' => 'wizard_rte2.gif',
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'module' => [
                            'name' => 'wizard_rich_text_editor',
                            'urlParameters' => [
                                'mode' => 'wizard',
                                'act' => 'wizard_rte.php',
                            ],
                        ],
                        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                        'type' => 'script',
                    ],
                ],
            ],
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.image',
            'config' => $imageConfigurationFalMedia,
        ],
        'tenimage' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.bgimage',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
    ],
];

<?php

use TYPO3\CMS\Core\Utility\VersionNumberUtility;

$typo3VersionArray = VersionNumberUtility::convertVersionStringToArray(VersionNumberUtility::getCurrentTypo3Version());
if (version_compare((string)$typo3VersionArray['version_main'], '11', '=')) {
    $types = [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, hide, title, heading, text;;;richtext:rte_transform[mode=ts_links],  endtime,  footertext;;;richtext:rte_transform[mode=ts_links], tenimage, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,  endtime'],
    ];
} else {
    $types = [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, hide, title, heading, text;;;richtext:rte_transform[mode=ts_links],  endtime,  footertext;;;richtext:rte_transform[mode=ts_links], image, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,  endtime'],
    ];
}
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
    'types' => $types,
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
                'enableRichtext' => true,
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
                'enableRichtext' => true,
            ],
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'image',
                        'tablenames' => 'tx_nitsanmaintenance_domain_model_maintenance',
                        'table_local' => 'sys_file',
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
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
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
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

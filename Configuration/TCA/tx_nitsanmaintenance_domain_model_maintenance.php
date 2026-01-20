<?php
$langfile = 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:';

return [
    'ctrl' => [
        'title' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance',
        'label' => 'title',
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
        'searchFields' => 'title,heading,text,countdown,fontcolor,footertext,fblink,twlink,linkedinlink,gitlink,',
        'iconfile' => 'EXT:nitsan_maintenance/Resources/Public/Icons/tx_nitsanmaintenance_domain_model_maintenance.gif',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_diffsource, hide,logo_image, logo_position, title,heading, text;;;richtext:rte_transform[mode=ts_links], whitelist, fblink, twlink,linkedinlink, gitlink, instagramlink, youtubelink, pagelinklabel, pagelink, footertext;;;richtext:rte_transform[mode=ts_links],

                --div--;LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tabs.css, themelayout,backgroundcolor, image, customcss, fontcolor,countdown,animate, countboxstyle, subscriptionheader, subscriptionplaceholder,subscriptionbtnlabel,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
        'hide' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.hide',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'animate' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.animate',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.enddate',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 16,
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
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
        'countdown' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.countdown',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'whitelist' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.whitelist',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'customcss' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.customcss',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'fontcolor' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.fontcolor',
            'config' => [
                'type' => 'color',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'subscriptionheader' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.subscriptionheader',
            'displayCond' => 'FIELD:countboxstyle:=:subscription',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'subscriptionplaceholder' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.subscriptionplaceholder',
            'displayCond' => 'FIELD:countboxstyle:=:subscription',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'subscriptionbtnlabel' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.subscriptionbtnlabel',
            'displayCond' => 'FIELD:countboxstyle:=:subscription',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'backgroundcolor' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.backgroundcolor',
            'displayCond' => 'FIELD:themelayout:=:2',
            'config' => [
                'type' => 'color',
                'size' => 30,
                'eval' => 'trim',
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
        'fblink' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.fblink',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'twlink' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.twlink',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'linkedinlink' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.linkedinlink',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'gitlink' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.gitlink',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'youtubelink' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.youtubelink',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'instagramlink' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.instagramlink',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'pagelinklabel' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.pagelinklabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'pagelink' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.pagelink',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'countboxstyle' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.countboxstyle',
            'onChange' => 'reload',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Square box', 'square'],
                    ['Circle with Progressbar', 'circle'],
                    ['Countdown with Subscription box', 'subscription'],
                ],
            ],
        ],
        'themelayout' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.themelayout',
            'onChange' => 'reload',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Image Background', 1],
                    ['Solid Background', 2],
                ],
            ],
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.image',
            'displayCond' => 'FIELD:themelayout:=:1',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'common-image-types',
            ],
        ],
        'logo_image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.logoimage',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'common-image-types',
            ],
        ],
        'logo_position' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.logo_position',
             'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Left','topleft'],
                    ['Center','topcenter'],
                    ['Right','topright']
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'whitelistfrontend' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.logo_position',
            'onChange' => 'reload',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Nothing', 1],
                    ['FE Group', 2],
                    ['FE users', 3]
                ],
            ],
        ],
        'users' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.whitelistfrontend.users',
            'displayCond' => 'FIELD:whitelistfrontend:=:3',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'usergroups' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.whitelistfrontend.groups',
            'displayCond' => 'FIELD:whitelistfrontend:=:2',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
    ],
];

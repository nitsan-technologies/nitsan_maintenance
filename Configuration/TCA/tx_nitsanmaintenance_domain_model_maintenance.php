<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance',
		'label' => 'robotsmeta',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'robotsmeta,title,heading,text,countdown,startdate,enddate,fontcolor,footertext,fblink,twlink,linkedinlink,gitlink,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('nitsan_maintenance') . 'Resources/Public/Icons/tx_nitsanmaintenance_domain_model_maintenance.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, robotsmeta, title, heading, text, countdown, startdate, enddate, whitelist, fontcolor, footertext, fblink, twlink, linkedinlink, gitlink',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, robotsmeta, title, heading, text;;;richtext:rte_transform[mode=ts_links], countdown, startdate, enddate, whitelist fontcolor, footertext;;;richtext:rte_transform[mode=ts_links], fblink, twlink, linkedinlink, gitlink, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_nitsanmaintenance_domain_model_maintenance',
				'foreign_table_where' => 'AND tx_nitsanmaintenance_domain_model_maintenance.pid=###CURRENT_PID### AND tx_nitsanmaintenance_domain_model_maintenance.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'robotsmeta' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.robotsmeta',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'heading' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.heading',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'text' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.text',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'countdown' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.countdown',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'startdate' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.startdate',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'whitelist' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.whitelist',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'enddate' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.enddate',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'fontcolor' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.fontcolor',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'footertext' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.footertext',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'fblink' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.fblink',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'twlink' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.twlink',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'linkedinlink' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.linkedinlink',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'gitlink' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_db.xlf:tx_nitsanmaintenance_domain_model_maintenance.gitlink',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		
	),
);## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
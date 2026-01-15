#
# Table structure for table 'tx_nitsanmaintenance_domain_model_maintenance'
#
CREATE TABLE tx_nitsanmaintenance_domain_model_maintenance (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title LONGTEXT DEFAULT '' NOT NULL,
	heading LONGTEXT DEFAULT '' NOT NULL,
	text text NOT NULL,
	countdown tinyint(1) unsigned DEFAULT '0' NOT NULL,
	animate tinyint(1) unsigned DEFAULT '0' NOT NULL,
	hide tinyint(1) unsigned DEFAULT '0' NOT NULL,
	whitelist varchar(255) DEFAULT '' NOT NULL,
	fontcolor varchar(255) DEFAULT '' NOT NULL,
    subscriptionheader varchar(255) DEFAULT '' NOT NULL,
    subscriptionplaceholder varchar(255) DEFAULT '' NOT NULL,
    subscriptionbtnlabel varchar(255) DEFAULT '' NOT NULL,
    customcss text NOT NULL,
	backgroundcolor varchar(255) DEFAULT '' NOT NULL,
	themelayout varchar(255) DEFAULT '' NOT NULL,
	countboxstyle varchar(255) DEFAULT '' NOT NULL,
	fblink varchar(255) DEFAULT '' NOT NULL,
	twlink varchar(255) DEFAULT '' NOT NULL,
	linkedinlink varchar(255) DEFAULT '' NOT NULL,
	gitlink varchar(255) DEFAULT '' NOT NULL,
	youtubelink varchar(255) DEFAULT '' NOT NULL,
	instagramlink varchar(255) DEFAULT '' NOT NULL,
	pagelinklabel LONGTEXT DEFAULT 'Contact us' NOT NULL,
	pagelink int(11),
	footertext text NOT NULL,
	image int(11) unsigned default '0',
	logo_image int(11) unsigned default '0',
	logo_position varchar(255) DEFAULT '' NOT NULL,
	whitelistfrontend int(11) unsigned default '1',
	users varchar(255) DEFAULT '' NOT NULL,
	usergroups varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 	KEY language (sys_language_uid)

);

#
# Table structure for table 'tx_nitsanmaintenance_domain_model_subscriber'
#
CREATE TABLE tx_nitsanmaintenance_domain_model_subscriber (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	subscriber_email varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 	KEY language (sys_language_uid)

);

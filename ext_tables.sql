#
# Table structure for table 'tx_kernaarau_domain_model_product'
#
CREATE TABLE tx_kernaarau_domain_model_product (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	code varchar(32) DEFAULT '' NOT NULL,
	keyword varchar(32) DEFAULT '' NOT NULL,
	description text NOT NULL,
	links text NOT NULL,
	columns text NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY code (code),
);
#
# Table structure for table 'tx_kernaarau_domain_model_glossary'
#
CREATE TABLE tx_kernaarau_domain_model_glossary (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	code varchar(32) DEFAULT '' NOT NULL,
	description text NOT NULL,
	links text NOT NULL,
	columns text NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY code (code),
);
#
# Table structure for table 'tx_kernaarau_domain_model_person'
#
CREATE TABLE tx_kernaarau_domain_model_person (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(64) DEFAULT '' NOT NULL,
	years25 varchar(16) DEFAULT '' NOT NULL,
	years40 varchar(16) DEFAULT '' NOT NULL,
	years50 varchar(16) DEFAULT '' NOT NULL,
	retired varchar(16) DEFAULT '' NOT NULL,
	decesed varchar(16) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY name (name),
);
#
# Table structure for table 'tx_kernaarau_domain_model_newspaper'
#
CREATE TABLE tx_kernaarau_domain_model_newspaper (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	issue varchar(7) DEFAULT '' NOT NULL,
	page tinyint(4) unsigned DEFAULT '0' NOT NULL,
	size varchar(8) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY issue (issue),
);
#
# Table structure for table 'tx_kernaarau_domain_model_form'
#
CREATE TABLE tx_kernaarau_domain_model_form (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	caption varchar(32) DEFAULT '' NOT NULL,
	keyPendantSilver tinyint(4) unsigned DEFAULT '0' NOT NULL,
	keyPendantGold tinyint(4) unsigned DEFAULT '0' NOT NULL,
	folkloreCD tinyint(4) unsigned DEFAULT '0' NOT NULL,
	title varchar(8) DEFAULT '' NOT NULL,
	firstName varchar(32) DEFAULT '' NOT NULL,
	lastName varchar(32) DEFAULT '' NOT NULL,
	addresse varchar(32) DEFAULT '' NOT NULL,
	postalCode varchar(16) DEFAULT '' NOT NULL,
	town varchar(32) DEFAULT '' NOT NULL,
	country varchar(32) DEFAULT '' NOT NULL,
	email varchar(32) DEFAULT '' NOT NULL,
	phone varchar(16) DEFAULT '' NOT NULL,
	note text DEFAULT '' NOT NULL,
	attachments varchar(256) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
);

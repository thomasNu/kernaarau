<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

/**
 * Configure the Plugin to call the
 * right combination of Controller and Action according to
 * the user input (default settings, FlexForm, URL etc.)
 */
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY, 'Product', 
	array(
		'Product' => 'index',
	),
	array(
		'Product' => 'index',
	)
);
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY, 'Glossary', 
	array(
		'Glossary' => 'index',
	),
	array(
		'Glossary' => 'index',
	)
);
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY, 'Person', 
	array(
		'Person' => 'index',
	),
	array(
	)
);
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY, 'Newspaper', 
	array(
		'Newspaper' => 'index',
	),
	array(
	)
);
/* Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY, 'Form', 
	array(
		'Form' => 'contact, order',
	),
	array(
		'Form' => 'contact, order',
	)
); */
/**
 * Content post processing for kern-aarau.ch
 */
$host = t3lib_div::getIndpEnv('TYPO3_HOST_ONLY');
if ($host == 'www.kern-aarau.ch' || $host == 'ka.thomasnu.ch') {
	$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'][]
		= 'EXT:kernaarau/Configuration/Script/class.tx_kernaarau_hooks.php:tx_kernaarau_hooks->substituteContent';
} 
?>

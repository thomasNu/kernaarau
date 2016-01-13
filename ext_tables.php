<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

/**
 * Registers a Plugin to be listed in the Backend. You also have to configure the Dispatcher in ext_localconf.php.
 */
Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Product', 'KernAarau Produkte');
Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Glossary', 'KernAarau Glossar bzw. News');
Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Person', 'KernAarau Personen');
Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Newspaper', 'KernAarau Hauszeitungen');
// Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Form', 'KernAarau Formulare');

$TCA['tx_kernaarau_domain_model_product'] = array (
	'ctrl' => array (
		'title' => 'Produkt',
		'label' => 'code',
		'default_sortby' => 'ORDER BY code ASC',
		'tstamp' => 'tstamp',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Product.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/product.gif'
	)
);
$TCA['tx_kernaarau_domain_model_glossary'] = array (
	'ctrl' => array (
		'title' => 'Glossareintrag',
		'label' => 'code',
		'default_sortby' => 'ORDER BY code ASC',
		'tstamp' => 'tstamp',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Glossary.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/glossary.gif'
	)
);
$TCA['tx_kernaarau_domain_model_person'] = array (
	'ctrl' => array (
		'title' => 'Person',
		'label' => 'name',
		'default_sortby' => 'ORDER BY name ASC',
		'tstamp' => 'tstamp',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Person.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/person.gif'
	)
);
$TCA['tx_kernaarau_domain_model_newspaper'] = array (
	'ctrl' => array (
		'title' => 'Hauszeitung',
		'label' => 'issue',
		'default_sortby' => 'ORDER BY issue ASC',
		'tstamp' => 'tstamp',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Newspaper.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/person.gif'
	)
);
/* $TCA['tx_kernaarau_domain_model_form'] = array (
	'ctrl' => array (
		'title' => 'Formulare',
		'label' => 'caption',
		'default_sortby' => 'ORDER BY caption ASC',
		'tstamp' => 'tstamp',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/form.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/form.gif'
	)
); */
// Include Flexforms
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_product'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_product', 'FILE:EXT:' . $_EXTKEY .'/Configuration/FlexForms/product.xml');
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_glossary'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_glossary', 'FILE:EXT:' . $_EXTKEY .'/Configuration/FlexForms/glossary.xml');
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_person'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_person', 'FILE:EXT:' . $_EXTKEY .'/Configuration/FlexForms/person.xml');
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_newspaper'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_newspaper', 'FILE:EXT:' . $_EXTKEY .'/Configuration/FlexForms/newspaper.xml');
// $TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_form'] = 'pi_flexform';
// t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_form', 'FILE:EXT:' . $_EXTKEY .'/Configuration/FlexForms/form.xml');

?>

<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_kernaarau_domain_model_product'] = array(
	'ctrl' => $TCA['tx_kernaarau_domain_model_product']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'code, keyword, description, links, columns'
	),
	'columns' => array(
        'hidden' => array(
            'exclude' => 1,
            'label' => 'Verbergen',
            'config' => array(
                'type' => 'check'
            )
        ),
		'code' => array(
			'label' => 'Produktbezeichnung',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim'
			)
		),
		'keyword' => array(
			'label' => 'Suchbegriffe: Kern-Bezeichnungen (nur [A-Za-z0-9]) mit Kommas getrennt, bei allgemeinen Begriffen: leer lassen',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim'
			)
		),
		'description' => array(
			'label' => 'Beschreibung',
			'config' => array(
				'type' => 'text',
				'eval' => 'trim'
			)
		),
		'links' => array(
			'label' => 'Links',
		    'config' => array(
                'type' => 'group',
                'internal_type' => 'file_reference',
                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
                'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
                'show_thumbs' => '1',
                'size' => '3',
                'maxitems' => '200',
                'minitems' => '0',
                'autoSizeMax' => 40,
			)
		),
		'columns' => array(
			'label' => 'Spalte (*, +, -) und Text (xxx) für jeden Link eine Zeile: * = Bild zu Produktbezeichnung (ohne Text), +xxx = Bilder, -xxx[#n] = Texte [n = Seite PDF]',
			'config' => array(
				'type' => 'text',
				'eval' => 'trim'
			)
		),
		'tstamp' => array(
			'exclude' => 1,
			'label' => 'Time stamp',
			'config' => array(
				'type' => 'none',
				'format' => 'date',
				'eval' => 'date'
 			)
		)
	),
	'types' => array(
		'1' => array('showitem' => 'code, keyword, description, links, columns')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);
?>

<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_kernaarau_domain_model_form'] = array(
	'ctrl' => $TCA['tx_kernaarau_domain_model_form']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'caption, firstName, note, attachments'
	),
	'columns' => array(
        'hidden' => array(
            'exclude' => 1,
            'label' => 'Verbergen',
            'config' => array(
                'type' => 'check'
            )
        ),
		'caption' => array(
			'label' => 'Formular',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim'
			)
		),
		'firstName' => array(
			'label' => 'Vorname',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim'
			)
		),
		'columns' => array(
			'label' => 'Mitteilung',
			'config' => array(
				'type' => 'text',
				'eval' => 'trim'
			)
		),
		'attachments' => array(
			'label' => 'Anhänge',
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
		'1' => array('showitem' => 'caption, firstName, note, attachments')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);
?>

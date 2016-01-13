<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_kernaarau_domain_model_person'] = array(
	'ctrl' => $TCA['tx_kernaarau_domain_model_person']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'name, years25, years40, years50, retired, decesed'
	),
	'columns' => array(
        'hidden' => array(
            'exclude' => 1,
            'label' => 'Verbergen',
            'config' => array(
                'type' => 'check'
            )
        ),
		'name' => array(
			'label' => 'Name Vorname (Abteilung)',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim'
			)
		),
		'years25' => array(
			'label' => '25 Jahre',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim'
			)
		),
		'years40' => array(
			'label' => '40 Jahre',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim'
			)
		),
		'years50' => array(
			'label' => '50 Jahre',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim'
			)
		),
		'retired' => array(
			'label' => 'pensioniert',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim'
			)
		),
		'decesed' => array(
			'label' => 'verstorben',
			'config' => array(
				'type' => 'input',
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
		'1' => array('showitem' => 'name, years25, years40, years50, retired, decesed')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);
?>

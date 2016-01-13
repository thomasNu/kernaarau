<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_kernaarau_domain_model_newspaper'] = array(
	'ctrl' => $TCA['tx_kernaarau_domain_model_newspaper']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'issue, page, size'
	),
	'columns' => array(
        'hidden' => array(
            'exclude' => 1,
            'label' => 'Verbergen',
            'config' => array(
                'type' => 'check'
            )
        ),
		'issue' => array(
			'label' => 'Ausgabe Jahr.Monat (JJJJ.MM): 4 Ausgaben / Jahr (Tabellenzeile)',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim'
			)
		),
		'page' => array(
			'label' => 'Seite Beginn Schwarzes Brett, 255 = Ausgabe fehlt (leeres Tabellenfeld)',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim'
			)
		),
		'size' => array(
			'label' => 'Dateigrösse PDF (#.# MB oder ### kB)',
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
		'1' => array('showitem' => 'issue, page, size')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);
?>

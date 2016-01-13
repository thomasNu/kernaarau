<?php
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = array (
    'encodeSpURL_postProc' => array ('user_encodeSpURL_postProc'),
    'decodeSpURL_preProc' => array ('user_decodeSpURL_preProc'),
	'_DEFAULT' => array (
		'init' => array (
			'enableCHashCache' => 1,
			'appendMissingSlash' => 'ifNotFile,redirect',
			'adminJumpToBackend' => 1,
			'enableUrlDecodeCache' => 1,
			'enableUrlEncodeCache' => 1,
			'emptyUrlReturnValue' => '/',
		),
		'pagePath' => array (
			'type' => 'user',
			'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
			'spaceCharacter' => '-',
			'languageGetVar' => 'L',
		),
		'fixedPostVars' => array (
			'personConfiguration' => array (
				array (
				    'GETvar' => 'tx_kernaarau_person[letter]',
			    ),
		    ),
	   		'14' => 'personConfiguration',
	   		
			'productConfiguration' => array (
				array (
				    'GETvar' => 'tx_kernaarau_product[letter]',
			    ),
		    ),
	   		'35' => 'productConfiguration',
	   		
			'glossaryConfiguration' => array (
				array (
				    'GETvar' => 'tx_kernaarau_glossary[letter]',
			    ),
		    ),
	   		'116' => 'glossaryConfiguration',
		),
		'postVarSets' => array (
		    '_DEFAULT' => array (
		        'controller' => array (
		            array (
		                'GETvar' => 'tx_kernaarau_person[action]',
		                'noMatch' => 'bypass'
		            ),
		            array (
		                'GETvar' => 'tx_kernaarau_person[controller]',
		                'noMatch' => 'bypass'
		            ),
		            array (
		                'GETvar' => 'tx_kernaarau_product[action]',
		                'noMatch' => 'bypass'
		            ),
		            array (
		                'GETvar' => 'tx_kernaarau_product[controller]',
		                'noMatch' => 'bypass'
		            ),
		            array (
		                'GETvar' => 'tx_kernaarau_glossary[action]',
		                'noMatch' => 'bypass'
		            ),
		            array (
		                'GETvar' => 'tx_kernaarau_glossary[controller]',
		                'noMatch' => 'bypass'
		            ),
		        ),
		    ),
		),
		'fileName' => array (
			'defaultToHTMLsuffixOnPrev' => 1,
			'acceptHTMLsuffix' => 1,
		),
	),
);
function user_encodeSpURL_postProc(&$params, &$ref) {
    $params['URL'] = preg_replace(
    	array('%personen/(.)\.html%', '%produkte-von-a-bis-z/(.)\.html%', '%/\%40\.html%', '%glossar/(.)\.html%'), 
    	array('personen-$1.html', 'produkte-$1.html', '.html', 'glossar-$1.html'), 
    	$params['URL']);
}
function user_decodeSpURL_preProc(&$params, &$ref) {
    $params['URL'] = preg_replace(
    	array('%personen-(.)\.html%', '%produkte-(.)\.html%', '%glossar-(.)\.html%'), 
    	array('personen/$1.html', 'produkte-von-a-bis-z/$1.html', 'glossar/$1.html'), 
    	$params['URL']);
}
?>

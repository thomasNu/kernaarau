<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "kernaarau".
 *
 * Auto generated 06-09-2013 19:01
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Extbase for Kern Aarau',
	'description' => 'Extension for Kern Aarau with Extbase and Fluid. Includes extended configuration and resources. See: www.thomasnu.ch and www.kern-aarau.ch.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '4.5.4',
	'dependencies' => 'extbase,fluid',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Thomas Nussbaumer',
	'author_email' => 'typo3@thomasnu.ch',
	'author_company' => 's+n edv, CH-6300 Zug',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'php' => '5.2.0-0.0.0',
			'typo3' => '4.5.0-6.2.99',
			'extbase' => '1.3.0-6.2.99',
			'fluid' => '1.3.0-6.2.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
	'_md5_values_when_last_written' => 'a:98:{s:12:"ext_icon.gif";s:4:"aa84";s:13:"ext_icon0.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"0d22";s:14:"ext_tables.php";s:4:"658d";s:14:"ext_tables.sql";s:4:"1450";s:9:"README.md";s:4:"30d9";s:39:"Classes/Controller/PersonController.php";s:4:"316c";s:40:"Classes/Controller/ProductController.php";s:4:"b9c5";s:31:"Classes/Domain/Model/Person.php";s:4:"7a01";s:32:"Classes/Domain/Model/Product.php";s:4:"0dec";s:46:"Classes/Domain/Repository/PersonRepository.php";s:4:"e3a3";s:47:"Classes/Domain/Repository/ProductRepository.php";s:4:"6d34";s:36:"Classes/ViewHelpers/IfViewHelper.php";s:4:"b15a";s:46:"Classes/ViewHelpers/ProductLinksViewHelper.php";s:4:"a35b";s:39:"Classes/ViewHelpers/ValueViewHelper.php";s:4:"e2e1";s:32:"Configuration/FlexForms/news.xml";s:4:"2909";s:34:"Configuration/FlexForms/person.xml";s:4:"5005";s:35:"Configuration/FlexForms/product.xml";s:4:"97a5";s:49:"Configuration/Script/class.tx_kernaarau_hooks.php";s:4:"c6a3";s:48:"Configuration/Script/class.tx_thomasnu_hooks.php";s:4:"6265";s:37:"Configuration/Script/realurl_conf.php";s:4:"7669";s:29:"Configuration/Script/user.php";s:4:"d66c";s:28:"Configuration/TCA/Person.php";s:4:"8c60";s:29:"Configuration/TCA/Product.php";s:4:"d76d";s:35:"Configuration/TypoScript/config.txt";s:4:"3448";s:36:"Configuration/TypoScript/content.txt";s:4:"4a65";s:37:"Configuration/TypoScript/content0.txt";s:4:"00b9";s:35:"Configuration/TypoScript/design.txt";s:4:"26ee";s:41:"Configuration/TypoScript/pageTSconfig.txt";s:4:"d0d3";s:40:"Resources/Private/Language/locallang.xml";s:4:"ca50";s:38:"Resources/Private/Layouts/Default.html";s:4:"b674";s:37:"Resources/Private/Partials/Alpha.html";s:4:"a059";s:41:"Resources/Private/Partials/NewsPaper.html";s:4:"bde9";s:45:"Resources/Private/Templates/Person/Index.html";s:4:"4fe6";s:46:"Resources/Private/Templates/Product/Index.html";s:4:"dcbb";s:32:"Resources/Public/Icons/audio.gif";s:4:"b43c";s:37:"Resources/Public/Icons/background.gif";s:4:"23a1";s:32:"Resources/Public/Icons/blank.gif";s:4:"f9d6";s:31:"Resources/Public/Icons/blog.gif";s:4:"375a";s:29:"Resources/Public/Icons/ch.gif";s:4:"3616";s:34:"Resources/Public/Icons/content.gif";s:4:"591c";s:31:"Resources/Public/Icons/copy.gif";s:4:"ddf4";s:32:"Resources/Public/Icons/copy1.gif";s:4:"85ed";s:30:"Resources/Public/Icons/cut.gif";s:4:"ac6f";s:31:"Resources/Public/Icons/cut1.gif";s:4:"a1ac";s:31:"Resources/Public/Icons/dash.gif";s:4:"1681";s:33:"Resources/Public/Icons/delete.gif";s:4:"1426";s:29:"Resources/Public/Icons/dk.gif";s:4:"70b4";s:30:"Resources/Public/Icons/doc.gif";s:4:"b828";s:30:"Resources/Public/Icons/dot.gif";s:4:"2d12";s:31:"Resources/Public/Icons/down.gif";s:4:"fa54";s:31:"Resources/Public/Icons/edit.gif";s:4:"3248";s:32:"Resources/Public/Icons/email.gif";s:4:"50a3";s:35:"Resources/Public/Icons/facebook.gif";s:4:"aca9";s:29:"Resources/Public/Icons/fi.gif";s:4:"ae74";s:31:"Resources/Public/Icons/find.gif";s:4:"3501";s:34:"Resources/Public/Icons/gallery.gif";s:4:"50a3";s:31:"Resources/Public/Icons/hide.gif";s:4:"fba8";s:34:"Resources/Public/Icons/history.gif";s:4:"3d2d";s:31:"Resources/Public/Icons/html.gif";s:4:"963c";s:33:"Resources/Public/Icons/images.gif";s:4:"8897";s:31:"Resources/Public/Icons/info.gif";s:4:"7a8f";s:31:"Resources/Public/Icons/list.gif";s:4:"488d";s:31:"Resources/Public/Icons/mail.gif";s:4:"3638";s:31:"Resources/Public/Icons/move.gif";s:4:"ddfd";s:29:"Resources/Public/Icons/no.gif";s:4:"1c4a";s:31:"Resources/Public/Icons/page.gif";s:4:"5098";s:32:"Resources/Public/Icons/paste.gif";s:4:"233a";s:30:"Resources/Public/Icons/pdf.gif";s:4:"ef7b";s:30:"Resources/Public/Icons/pen.gif";s:4:"8ced";s:33:"Resources/Public/Icons/person.gif";s:4:"b1d8";s:32:"Resources/Public/Icons/photo.gif";s:4:"50a3";s:32:"Resources/Public/Icons/print.gif";s:4:"971f";s:34:"Resources/Public/Icons/product.gif";s:4:"50a3";s:32:"Resources/Public/Icons/quick.gif";s:4:"772e";s:33:"Resources/Public/Icons/search.gif";s:4:"e2ab";s:34:"Resources/Public/Icons/section.gif";s:4:"50a3";s:31:"Resources/Public/Icons/stop.gif";s:4:"1749";s:32:"Resources/Public/Icons/typo3.gif";s:4:"52c4";s:33:"Resources/Public/Icons/unhide.gif";s:4:"fde9";s:29:"Resources/Public/Icons/up.gif";s:4:"0cc7";s:31:"Resources/Public/Icons/user.gif";s:4:"b1d8";s:32:"Resources/Public/Icons/user1.gif";s:4:"8704";s:32:"Resources/Public/Icons/video.gif";s:4:"e71a";s:30:"Resources/Public/Icons/web.gif";s:4:"f625";s:37:"Resources/Public/Javascript/design.js";s:4:"529e";s:38:"Resources/Public/Javascript/gallery.js";s:4:"9719";s:37:"Resources/Public/Javascript/jquery.js";s:4:"fe46";s:38:"Resources/Public/Stylesheet/basics.css";s:4:"0d50";s:39:"Resources/Public/Stylesheet/content.css";s:4:"28a2";s:38:"Resources/Public/Stylesheet/jquery.css";s:4:"f4e7";s:40:"Resources/Public/Stylesheet/navigate.css";s:4:"806d";s:37:"Resources/Public/Stylesheet/print.css";s:4:"a372";s:38:"Resources/Public/Stylesheet/screen.css";s:4:"c48f";s:37:"Resources/Public/Stylesheet/typo3.css";s:4:"11d5";s:19:"dev/ExportJquery.js";s:4:"8571";s:21:"dev/ProductIndex.html";s:4:"1984";s:14:"doc/manual.sxw";s:4:"5133";}',
);

?>

<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Thomas Nussbaumer <typo3@thomasnu.ch>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Content post processing for kern-aarau.ch
 */
class tx_kernaarau_hooks {
    /**
     * Substitution of content
     */
    public function substituteContent($_params, $feObj) {
        $settings = $feObj->tmpl->setup['tx_kernaarau.']; // print_r($settings);
        $remoteAddr = t3lib_div::getIndpEnv('REMOTE_ADDR');
//       if (t3lib_div::inList($settings['remotes'], t3lib_div::getIndpEnv('REMOTE_ADDR'))) {
//            echo 'User = ' . $settings['user'] . ' - Addresses = ' . $settings['remotes'] . '<br />';
//            echo 'Addresses = ' . $settings['remotes'] . '<br />';
//    if (t3lib_div::inList($settings['remotes'], $remoteAddr)) {

        $links = array(
            array('&nbsp;', '„', '“', '«', '»', '´', '`',
                '<p>###GCSE###</p>'),
            array(' ',      '"', '"', '"', '"', "'", "'",
                '<gcse:searchresults-only></gcse:searchresults-only>')
        );   
        $paths = array();
        $names = array();
        $pics = array();
        $picExts = array();
        $uploadedFiles = array();

        $dir = 'fileadmin/user_upload/';
        $typeList = 'jpg,png,gif,JPG,PNG,GIF';
        $types = explode(',', $typeList);
        $files = t3lib_div::getAllFilesAndFoldersInPath(array(), $dir, $typeList, 1); // print_r($files);
        foreach($files as $key => $value) {
            preg_match('%(' . str_replace('/', '\/', $dir) . ')(.+)/(.+)\.(' . str_replace(',', '|', $typeList) . ')$%', $value, $matches);
            if ($matches[4] > '') {
                $paths[] = $matches[1] . $matches[2] . '/';
                $names[] = $matches[3] . '.' . $matches[4];
            }
        }

        $uploads = t3lib_div::getAllFilesAndFoldersInPath(array(), $dir, '', 1);
        $uploads = t3lib_div::getAllFilesAndFoldersInPath($uploads, 'uploads/', '', 1);
        foreach($uploads as $key => $filePath) {
		    $parts = t3lib_div::split_fileref($filePath);
            if ($parts[fileext]) {
                $fileStamp = @filemtime(t3lib_div::getFileAbsFileName($filePath));
//                $uploadedFiles[] = $fileStamp . '§' . $filePath;
                $uploadList .= $fileStamp . '§' . $filePath . "\n";
//                echo $filePath .' (' . date('Y.m.d H:i:s', $fileStamp) . ')<br />';
            } 
        }
//        print_r($uploadedFiles);
//        echo $uploadList;
        t3lib_div::writeFile('fileadmin/sync/uploads.txt', $uploadList);
        
//        } 

	preg_match('%<div class="middle">(.+)<div class="clear-content">%s', $feObj->content, $matches); // echo '§' . $matches[1] . '§<br />';
        $n = preg_match_all('%<a(.*)>(.+)</a>%U', $matches[1], $matches, PREG_PATTERN_ORDER);
        for ($i = 0; $i < $n; ++$i) {
            $link = $matches[1][$i]; 
            $inlink = $matches[2][$i]; //  echo '§' . $link . '§' . $inlink . '§' . t3lib_div::getIndpEnv('REQUEST_URI') . '§<br />';   // $GLOBALS['TSFE']->baseUrl
            if (strpos($link, 'class="news-list"') || strpos($link, substr(t3lib_div::getIndpEnv('REQUEST_URI'), 1)) || strpos($link, 'class="mail"')) {
                continue;
            }    
            if (strpos($link, 'href="http') || strpos($link, 'href="kern')) {
        		preg_match('%//(.+)/%U', $link . '/', $wwwMatches);
        		preg_match('%(kern|kern-intern|kern-extern)/(.+)\.html%U', $link, $pageMatches);
          		$links[0][] = $link;
            	$links[1][] = preg_replace(
                    array('%target=\".*\"%U', '%title=\".*\"%U', '%href=%'), 
                    array('', '', ((strpos($link, 'href="kern') || strpos($link, $GLOBALS['TSFE']->baseUrl)) 
                        ? 'title="Zur Seite: ' . ($pageMatches[1] == 'kern' ? $pageMatches[2] : $pageMatches[1] . '/' . $pageMatches[2])  
                        : 'target="_blank" title="' . $wwwMatches[1]) . '" href='), $link);
//               $links[1][] = $l1; echo $l1 . '<br />';        
                continue;
            }
	        preg_match('%href="(.+)"%U', $link . '/', $hrefMatches);
            preg_match('%' . str_replace(',', '|', $typeList) . '$%', $link, $typeMatches);
            if ($typeMatches[0] == '') {
        	  	$parts = explode('#', $hrefMatches[1]);
         		$href = $parts[0]; 
        		$parts = t3lib_div::split_fileref($href);
                if ($fileSize = @filesize(t3lib_div::getFileAbsFileName($href))) {
		            $title = 'Herunterladen: ' . strtoupper($parts['fileext']) . ' ' . t3lib_div::formatSize($fileSize, 'B| kB| MB| GB');
          		    $links[0][] = $link;
            	    $links[1][] = preg_replace(
                        array('%target=\".*\"%U', '%title=\".*\"%U', '%href=%'), 
                        array('', '', 'target="_blank" title="' . $title . '" href='), $link);
                } else {
          		    $links[0][] = $link;
            	    $links[1][] = ' href="' . $GLOBALS['TSFE']->siteScript . '" title="*** ' . $href . ' fehlt! ***"';   
                }
                continue;
            }

            preg_match(stripos($link, 'file=') 
                ? '/file=uploads%2Fpics%2F(.+)\.' . $typeMatches[0] . '&amp;md5/U' 
                : '%href="(.+)\.' . $typeMatches[0] . '"%U', $link, $hrefMatches);
            $fname = substr($hrefMatches[1], strrpos('/' . $hrefMatches[1], '/'));
            $filePath = '';
            do {  
                 $fi = array_search($fname . '.' . $typeMatches[0], $names);
                 if ($filePath == '') {
                     $filePath = $paths[$fi] . $names[$fi];
                 }
                 preg_match('%_[0-9a-f]+$%', $fname, $fileMatches);
                 if ($fileMatches[0] > '') {
                     $fname = substr($fname, 0, strrpos($fname, $fileMatches[0]));
                 }
             } while ($fileMatches[0] > '' && $fi === FALSE);
             if ($fi === FALSE) { 
                 preg_match('%<img.+src="(.+)".*/>%U', $inlink, $srcMatches);
                 $href = $srcMatches[1];
             } else {
                 $href = $paths[$fi] . $names[$fi];    
             }

             if (substr($href, 0, 9) != 'fileadmin') {
                 preg_match('%pics/(.+)_[0-9a-f]{10}%U', $href, $hrefMatches);
                 $fi2 = array_search($hrefMatches[1], $pics);
                 $href = 'uploads/pics/' . $pics[$fi2] . '.' . $picExts[$fi2]; 
             }
             $img = $feObj->cObj->IMAGE(array('file' => $href, 'file.' => array('width' => '800')));
             preg_match('%src="(.+)"%U', $img, $imgMatches);
	     if ($imgMatches[1] > '') {
	         $fparts = t3lib_div::split_fileref($href);
                 $fileBody = $fparts[filebody]; 
                 $src = str_replace(str_replace('.', '', $fileBody), '*' . str_replace('.', ':', $fileBody) . '*', $imgMatches[1]);
             } else {
                 $src = $filePath;
             }
 
	     $fparts = t3lib_div::split_fileref($href);
         $fsize = filesize(t3lib_div::getFileAbsFileName($href));
	     $href .= '|Herunterladen: ' . strtoupper($fparts['fileext']) . ' ' . t3lib_div::formatSize($fsize, 'B| kB| MB| GB') . '|*';
      	     $links[0][] = $link;
             $links[1][] = ' href="' . $src . '" title="' . $href . '" target="thePicture"';

        }  // end for ($i = 0; $i < $n; ++$i)      
        $feObj->content = str_replace($links[0], $links[1], $feObj->content);
 
//    } // end if (t3lib_div::inList($settings['remotes'], t3lib_div::getIndpEnv('REMOTE_ADDR')))
     } // end function
}  // end class
?>

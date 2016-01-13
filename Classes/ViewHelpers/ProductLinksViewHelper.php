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
 * View helper for rendering product links.
 */
class Tx_Kernaarau_ViewHelpers_ProductLinksViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Render the link with supplied uri from s+n edv.
	 *
	 * @param string $code The product code ('*code' or '+code', '-code' for the other columns)
	 * @param string $links The link list
	 * @param string $columns The columns text (*, +xxx, -xxx) 
	 * @param string $links The description
	 * @param string $width The width of tumbnail
	 * @return string Rendered string
	 */
    public function render($code, $links, $columns, $descr, $width = '50') {
		$codeType = substr(trim($code), 0, 1);
		$code = substr(trim($code), 1);
		$codeLink = FALSE;
        $urls = explode(',', $links);
		$cols = explode("\n", $columns);
		$link = "";
		$i = 0;
		while ($i < count($urls)) {
			$colParts = explode('#', $cols[$i]);
            $cols[$i] = $colParts[0];
            $fileParts = t3lib_div::split_fileref($urls[$i]);
            $fileType = strtoupper($fileParts['fileext']);
            if ($fileSize = @filesize(t3lib_div::getFileAbsFileName($urls[$i]))) {
                $linkTitle = ' Herunterladen: ' . $fileType . ' ' . t3lib_div::formatSize($fileSize, 'B| kB| MB| GB');
                $tit = 'target="_blank" title="' . $linkTitle;
            } else {
  				$tit = 'title="*** ' . $urls[$i] . ' fehlt! ***';
    			$urls[$i] = $GLOBALS['TSFE']->siteScript;
            }
			$txt = '';
			$img = '';
			if ($codeType != '+' && $codeType != '-' && ord($cols[$i]) == ord('*')) {
//				$txt = '<u>' . $code . '</u>';
				$txt = $code;
                $img = '<br /><img src="' . $urls[$i] . '" width="' . $width . '" />';
				$codeLink = TRUE;
			} elseif ($codeType == '+' && ord($cols[$i]) == ord('+') || $codeType == '-' && ord($cols[$i]) == ord('-')) { 
				$txt = substr(trim($cols[$i]), 1);
			}
			if ($colParts[1] && $fileType == 'PDF') $urls[$i] .= '#page=' . $colParts[1];
            if ($txt && $fileType == 'PDF') {
                $link .= '<a class="ka-download" href="' . $urls[$i] . '" ' . $tit . '">' . $txt . '</a><br />';
            } elseif ($txt) {
                $link .= '<a target="thePicture" href="' . $urls[$i] . '" title="' . $urls[$i] . '|' . $linkTitle . '|' . $txt . '|' . $code . '|' . $descr . '">' . $txt . ($img ? $img : '') . '</a><br />';
            } 
			++$i;
		}
		if ($codeType != '+' && $codeType != '-' && !$codeLink) $link = $code;
		return $link;
	}
}
?>

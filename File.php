<?php

/**
 * File class
 *
 * Luki framework
 * Date 19.9.2012
 *
 * @version 3.0.0
 *
 * @author Peter Alaxin, <alaxin@almex.sk>
 * @copyright (c) 2009, Almex spol. s r.o.
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 *
 * @package Luki
 * @subpackage Class
 * @filesource
 */

namespace Luki;

/**
 * File class
 *
 * Files management
 *
 * @package Luki
 */
class File {

	/**
	 * Define mime type for file
	 * @param string $sFileName
	 * @return string
	 * @assert (__FILE__) == 'text/x-php'
	 * @assert ('abc') == NULL
	 * @assert () == NULL
	 */
	public static function getMimeType($sFileName = '')
	{
		$sMimeType = NULL;

		if(is_file($sFileName)) {
			$oFileInfo = new \finfo(FILEINFO_MIME_TYPE);
			$sMimeType = $oFileInfo->file($sFileName);
		}

		unset($sFileName, $oFileInfo);
		return $sMimeType;
	}

	public static function getFilesInDirectory($sDirectory) 
	{
		$aFiles = array();
		$oDir = dir($sDirectory); 
		
		while(($sDir = $oDir->read()) !== false) {
			if($sDir != '.' and $sDir != '..') {
				$aFiles[] = $sDir; 
			}	
		} 
		asort($aFiles);
		
		return $aFiles;
	}
}

# End of file
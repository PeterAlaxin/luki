<?php

/**
 * Simple Log Writer
 *
 * Luki framework
 * Date 16.12.2012
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

/**
 * Simple Log Writer
 * 
 * @package Luki
 */
class Luki_Log_Writer_Simple implements Luki_Log_Writer_Interface {


	public function __construct($sFile='')
	{
		unset($sFile);
	}
	
	public function Write($sText)
	{
		if(is_array($sText)) {
			$sText = json_encode($sText);
		}
		
		echo $sText . '<br />';
			
		unset($sText);
	}
}

# End of file
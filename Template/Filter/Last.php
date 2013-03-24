<?php

/**
 * Last template filter adapter
 *
 * Luki framework
 * Date 22.3.2013
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
 * Last template filter
 * 
 * @package Luki
 */
class Luki_Template_Filter_Last {

	public function Get($sValue)
	{
		switch(gettype($sValue)) {
			case 'string':
				$sReturn = mb_substr($sValue, -1);
				break;
			case 'array':
				$sValue = array_reverse($sValue);
				foreach($sValue as $sVal) {
					$sReturn = $sVal;
					break;
				}
				break;
			default:
				$sReturn = $sValue;
		}
		
		unset($sValue);
		return $sReturn;
	}
}

# End of file
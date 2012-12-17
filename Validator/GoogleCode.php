<?php

/**
 * Google analytics code validator
 *
 * Luki framework
 * Date 14.12.2012
 *
 * @version 3.0.0
 *
 * @author Peter Alaxin, <alaxin@almex.sk>
 * @copyright (c) 2009, Almex spol. s r.o.
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 *
 * @package Luki
 * @subpackage Validator
 * @filesource
 */

/**
 * Google analytics code validator
 * 
 * @package Luki
 */
class Luki_Validator_GoogleCode extends Luki_Validator_Factory {

	public $sValidator = '/^UA-([0-9]{7,8})-([0-9]{1,2})$/';
	
	public $sMessage = 'The value "%value%" is not valid Google analytics code!';

}

# End of file
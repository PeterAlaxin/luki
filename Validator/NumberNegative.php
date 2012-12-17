<?php

/**
 * Negative number validator
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
 * Negative number validator
 * 
 * @package Luki
 */
class Luki_Validator_NumberNegative extends Luki_Validator_Factory {

	public $sValidator = '/^-[0-9]*[.]?[0-9]*$/';
	
	public $sMessage = 'The value "%value%" is not valid negative number!';

}

# End of file
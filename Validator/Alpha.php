<?php

/**
 * Alpha validator
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
 * Alpha validator
 * 
 * @package Luki
 */
class Luki_Validator_Alpha extends Luki_Validator_Factory {

	public $sValidator = '/^[a-zA-ZáäčďéěëíľňôóöŕřšťúůüýžÁÄČĎÉĚËÍĽŇÓÖÔŘŔŠŤÚŮÜÝŽ\ ]*$/';
	
	public $sMessage = 'The value "%value%" contains characters other than letters!';

}

# End of file
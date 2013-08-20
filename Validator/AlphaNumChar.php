<?php

/**
 * AlphaNumChar validator
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

namespace Luki\Validator;

use Luki\Validator\basicFactory;

/**
 * AlphaNumChar validator
 * 
 * @package Luki
 */
class AlphaNumChar extends basicFactory {

	public $sValidator = '/[\r\n\+\-\*\\\.\,\:\;\%\(\)\/\?\!\&\=\_\@\#\$\^\{\}\"\'\|\`\<\>\~áäčďéěëíľňôóöŕřšťúůüýžÁÄČĎÉĚËÍĽŇÓÖÔŘŔŠŤÚŮÜÝŽ\ ]*/';
	
	public $sMessage = 'The value "%value%" contains characters other than letters or digits or allowed characters!';

}

# End of file
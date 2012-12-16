<?php

/**
 * Log Writer interface
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
 * Log Writer interface
 * 
 * @package Luki
 */
interface Luki_Log_Writer_Interface {

	public function __construct($sFile);

	public function Write($sText);
}

# End of file
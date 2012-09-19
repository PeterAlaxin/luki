<?php

/**
 * Loader class
 *
 * Luki framework
 * Date 18.9.2012
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
 * Loader class
 *
 * Load files, classes
 *
 * @package Luki
 */
class Luki_Loader {

	/**
	 * Search path array 
	 * @access private
	 */
	private static $_aPath = array();

	/**
	 * Disable construct
	 */
	protected function __construct()
	{
	}

	/**
	 * Disable clone
	 */
	private function __clone()
	{
	}

	/**
	 * Initialize loader
	 * @param string $sPath
	 * @uses Luki_Loader::_Init Initialize loader
	 */
	public static function Add($sPath = '')
	{
		self::_Init();

		if(!empty($sPath) and is_dir($sPath)) {

			if(substr($sPath, -1) !== DIRECTORY_SEPARATOR) {
				$sPath .= DIRECTORY_SEPARATOR;
			}

			if(!in_array($sPath, self::$_aPath)) {
				array_unshift(self::$_aPath, $sPath);
			}
		}
		
		unset($sPath);
	}

	/**
	 * Autoload function
	 * @param string $sClassName
	 * @uses Luki_Loader::_Init Initialize loader
	 */
	public static function Autoload($sClassName = '')
	{
		self::_Init();

		$sClassFile = preg_replace('/_/', '/', $sClassName) . '.php';
		
		foreach(self::$_aPath as $sPath) {
			$sClassFileWithPath = $sPath . $sClassFile;
			if(is_file($sClassFileWithPath) and is_readable($sClassFileWithPath)) {
				require_once($sClassFileWithPath);
				break;
			}
		}
		
		unset($sClassName, $sClassFile, $sClassFileWithPath);
	}

	/**
	 * Get searched path array 
	 * @return array
	 */
	public static function getPath()
	{
		return self::$_aPath;
	}
	
	/**
	 * First time initialization
	 */
	private static function _Init()
	{
		if(empty(self::$_aPath)) {
			array_unshift(self::$_aPath, dirname(__FILE__) . DIRECTORY_SEPARATOR);
			spl_autoload_register('Luki_Loader::Autoload');
		}
	}

}

# End of file
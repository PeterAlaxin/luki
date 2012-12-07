<?php

/**
 * Time class
 *
 * Luki framework
 * Date 30.11.2012
 *
 * @version 3.0.0
 *
 * @author Peter Alaxin, <alaxin@almex.sk>
 * @copyright (c) 2009, Almex spol. s r.o.
 * * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 *
 * @package Luki
 * @subpackage Class
 * @filesource
 */

/**
 * Time class
 *
 * Time manipulation
 *
 * @package Luki
 */
class Luki_Time {

	public static $sFormat = 'H:i:s';
	public static $sTimeValidator = '/^(([0-1]?[0-9])|([2][0-3])):([0-5]?[0-9])(:([0-5]?[0-9]))?$/';
	private static $nStart = 0;
	private static $nStop = 0;

	/**
	 * Set output time format
	 * 
	 * @param type $sFormat
	 */
	public static function setFormat($sFormat = 'H:i:s')
	{
		$bReturn = FALSE;

		$oDate = date_create('now');
		if(FALSE !== $oDate->format($sFormat)) {
			self::$sFormat = $sFormat;
			$bReturn = TRUE;
		}

		unset($sFormat);
		return $bReturn;
	}

	/**
	 * Get current format
	 */
	public static function getFormat()
	{
		return self::$sFormat;
	}

	/**
	 * Reset output time format to default
	 * 
	 * @param type $sFormat
	 */
	public static function resetFormat()
	{
		self::$sFormat = 'H:i:s';
	}

	public static function explodeMicrotime()
	{
		list($usec, $sec) = explode(" ", microtime());
		$nReturn = ((float) $usec + (float) $sec);

		unset($usec, $sec);
		return $nReturn;
	}

	public static function DateTimeToFormat($dDateTime, $sFormat = 'r')
	{
		$dDate = Luki_Date::DateTimeToFormat($dDateTime, $sFormat);

		unset($dDateTime, $sFormat);
		return $dDate;
	}

	public static function DateTimeToMicrotime($dDateTime)
	{
		$sMicro = Luki_Date::DateTimeToMicrotime($dDateTime);

		unset($dDateTime);
		return $sMicro;
	}

	/**
	 * Start stopwatch
	 * 
	 * @return float 
	 */
	public static function stopwatchStart()
	{
		self::$nStart = self::explodeMicrotime();

		return self::$nStart;
	}

	/**
	 * Get time when stopwatch started
	 * 
	 * @return float
	 */
	public static function getStopwatchStart()
	{
		return self::$nStart;
	}

	/**
	 * Stop stopwatch
	 * 
	 * @return float
	 */
	public static function stopwatchStop()
	{
		self::$nStop = self::explodeMicrotime();

		return self::$nStop;
	}

	/**
	 * Get time when stopwatch stoped
	 * 
	 * @return float
	 */
	public static function getStopwatchStop()
	{
		return self::$nStop;
	}

	/**
	 * Return stopwatch time in seconds
	 * 
	 * @return float
	 */
	public static function getStopwatch()
	{
		$nStopWatch = self::$nStop - self::$nStart;

		return $nStopWatch;
	}

}

# End of file
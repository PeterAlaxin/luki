<?php

/**
 * Round template filter adapter
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

namespace Luki\Template\Filters;

/**
 * Round template filter
 * 
 * @package Luki
 */
class Round
{

    public function Get($value, $decimals = 0, $direction = '')
    {
        if ( 'ceil' == $direction ) {
            $number = ceil($value * pow(10, $decimals)) / pow(10, $decimals);
        }
        elseif ( 'floor' == $direction ) {
            $number = floor($value * pow(10, $decimals)) / pow(10, $decimals);
        } else {
            $number = round($value, $decimals);
        }

        unset($value, $decimals, $direction);
        return $number;
    }

}

# End of file
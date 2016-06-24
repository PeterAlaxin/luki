<?php

/**
 * Raw template filter adapter
 *
 * Luki framework
 * Date 24.8.2013
 *
 * @version 3.0.0
 *
 * @author Peter Alaxin, <peter@lavien.sk>
 * @copyright (c) 2009, Almex spol. s r.o.
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 *
 * @package Luki
 * @subpackage Class
 * @filesource
 */

namespace Luki\Template\Filters;

/**
 * Raw template filter
 * 
 * @package Luki
 */
class Raw
{

    public function Get($value)
    {
        $raw = rawurlencode($value);

        unset($value);
        return $raw;
    }

}

# End of file
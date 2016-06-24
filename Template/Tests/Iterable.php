<?php

/**
 * Iterable template test 
 *
 * Luki framework
 * Date 22.3.2013
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

namespace Luki\Template\Tests;

/**
 * Iterable template test
 * 
 * @package Luki
 */
class Iterable
{

    public function Is($value)
    {

        $isIterable = is_array($value);

        unset($value);
        return $isIterable;
    }

}

# End of file
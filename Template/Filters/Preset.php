<?php
/**
 * Preset template filter adapter
 *
 * Luki framework
 *
 * @author Peter Alaxin, <peter@lavien.sk>
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 *
 * @package Luki
 * @subpackage Template
 * @filesource
 */

namespace Luki\Template\Filters;

class Preset
{

    public function Get($value, $default = '')
    {
        $preset = empty($value) ? $default : $value;

        return $preset;
    }
}
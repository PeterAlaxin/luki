<?php
/**
 * SelectiveBlur filter
 *
 * Luki framework
 *
 * @author Peter Alaxin, <peter@lavien.sk>
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 *
 * @package Luki
 * @subpackage Image
 * @filesource
 */

namespace Luki\Image\Filter;

use Luki\Image\Filter\BasicAdapter;

class SelectiveBlur extends BasicAdapter
{
    public $method = IMG_FILTER_SELECTIVE_BLUR;

}
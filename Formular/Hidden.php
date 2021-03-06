<?php
/**
 * Hidden input
 *
 * Luki framework
 *
 * @author Peter Alaxin, <peter@lavien.sk>
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 *
 * @package Luki
 * @subpackage Formular
 * @filesource
 */

namespace Luki\Formular;

use Luki\Formular\BasicFactory;

class Hidden extends BasicFactory
{

    public function __construct($name, $label, $placeholder = '')
    {
        parent::__construct($name, '');
        $this->setType('hidden');
    }

    public function getHtml()
    {
        $html          = parent::getHtml();
        $html['label'] = '';

        return $html;
    }
}
<?php
/**
 * Wordwrap template filter adapter
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

class Wordwrap
{

    public function Get($value, $width = 75)
    {
        $wrapped = $this->mb_wordwrap($value, $width);

        return $wrapped;
    }

    private function mb_wordwrap($str, $width = 75)
    {
        $encoding = mb_detect_encoding($str);
        if (empty($str) or mb_strlen($str, $encoding) <= $width) {
            return $str;
        }

        $break     = chr(10);
        $brWidth   = mb_strlen($break, $encoding);
        $strWidth  = mb_strlen($str, $encoding);
        $return    = '';
        $lastSpace = false;

        for ($i = 0, $count = 0; $i < $strWidth; $i++, $count++) {
            if (mb_substr($str, $i, $brWidth, $encoding) == $break) {
                $count  = 0;
                $return .= mb_substr($str, $i, $brWidth, $encoding);
                $i      += $brWidth - 1;
                continue;
            }

            if (mb_substr($str, $i, 1, $encoding) == " ") {
                $lastSpace = $i;
            }

            if ($count >= $width) {
                if (!$lastSpace) {
                    $return .= $break;
                    $count  = 0;
                } else {
                    $drop = $i - $lastSpace;

                    if ($drop > 0) {
                        $return = mb_substr($return, 0, -$drop);
                    }

                    $return    .= $break;
                    $i         = $lastSpace + ($brWidth - 1);
                    $lastSpace = false;
                    $count     = 0;
                }
            }

            $return .= mb_substr($str, $i, 1, $encoding);
        }

        return $return;
    }
}
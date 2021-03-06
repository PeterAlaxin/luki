<?php
/**
 * URL class for SEO
 *
 * Luki framework
 *
 * @author Peter Alaxin, <peter@lavien.sk>
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 *
 * @package Luki
 * @subpackage Url
 * @filesource
 */

namespace Luki;

class Url
{
    private static $accentedChars = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï',
        'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è',
        'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă',
        'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę',
        'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ',
        'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň',
        'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š',
        'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ',
        'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ',
        'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
    private static $cleanChars    = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I',
        'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e',
        'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A',
        'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e',
        'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I',
        'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n',
        'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's',
        'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y',
        'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U',
        'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');

    public function __destruct()
    {
        foreach ($this as &$value) {
            $value = null;
        }
    }

    public static function makeLink($value, $allowUnicode = false)
    {
        $link = '';

        if (is_string($value)) {
            $link = mb_strtolower($value, 'UTF-8');
            $link = str_replace('&', '-and-', $link);
            $link = preg_replace('~[^\pL\d]+~u', '-', $link);
            $link = str_replace(self::$accentedChars, self::$cleanChars, $link);
            $link = preg_replace('~[^-\w]+~', '', $link);
            $link = trim($link, '-');
            $link = preg_replace('~-+~', '-', $link);
        } elseif (is_array($value)) {

            foreach ($value as $linkPart) {
                $link .= self::makeLink((string) $linkPart).'/';
            }
        } else {
            $link = self::makeLink((string) $value);
        }

        return $link;
    }

    static public function Reload($link = '', $response = 302)
    {
        if (!empty($link)) {
            if (Storage::isLogRedirect() and Storage::LogRedirect() and Storage::isRequest()) {
                Storage::Log()->Notice('Redirect '.Storage::Request()->getFullUrl().' => '.$link);
            }

            header('Location: '.$link, true, $response);
            exit;
        }
    }

    public static function getUrlData($url)
    {
        $result   = array(
            'title'          => null,
            'lang'           => null,
            'metaTags'       => array(),
            'metaProperties' => array(),
        );
        $contents = file_get_contents($url);

        if (isset($contents) and is_string($contents)) {

            preg_match('/<title>([^>]*)<\/title>/si', $contents, $match);
            if (isset($match[1])) {
                $result['title'] = strip_tags($match[1]);
            }

            preg_match('/<html lang="(.+?(?:_([a-z]{2,3})(?:_([a-zA-Z]{2,3}))?)?)"/', $contents, $match);
            if (isset($match[1])) {
                $result['lang'] = strip_tags($match[1]);
            }

            preg_match_all('/<[\s]*meta[\s]*(name|property)="?'.'([^>"]*)"?[\s]*'.'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si',
                $contents, $match);

            if (is_array($match) and count($match) == 4) {
                $names  = $match[2];
                $values = $match[3];

                if (count($match[0]) == count($names) and count($names) == count($values)) {
                    for ($i = 0; $i < count($names); $i++) {
                        if ($match[1][$i] == 'name') {
                            $meta_type = 'metaTags';
                        } else {
                            $meta_type = 'metaProperties';
                        }
                        $result[$meta_type][strtolower($names[$i])] = $values[$i];
                    }
                }
            }
        }

        return $result;
    }
}
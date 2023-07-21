<?php

namespace helpers;

use DOMDocument;

class Text
{
    /**
     * Trim certain paragraphs from content by tag
     * @param $text
     * @param $count
     * @param $tag
     * @return string
     */
    public static function trimParagraphs($text, $count, $tag = 'p')
    {
        $dom = new DOMDocument();
        $paragraphs = array();
        $dom->loadHTML($text);
        foreach($dom->getElementsByTagName($tag) as $node)
        {
            $paragraphs[] = $dom->saveHTML($node);
        }
        $paragraphs = array_splice($paragraphs, 0, $count);

        return implode($paragraphs);
    }

    /**
     * Trim text by certain count of characters
     * @param $text
     * @param $ch
     * @param $ellipsis
     * @return string
     */
    public static function trimText($text, $ch, $ellipsis = true)
    {
        return substr($text, 0, $ch) . ($ellipsis && strlen($text) > $ch ? '...' : '');
    }

    /**
     * Convert string to ID look
     * @param $str
     * @return string
     */
    public static function strToId($str)
    {
        return strtolower(str_replace(' ', '-', $str));
    }

    /**
     * Keep only first letter uppercase
     * @param $str
     * @return string
     */
    public static function ucOnlyFirst($str)
    {
        return ucfirst(strtolower($str));
    }

    /**
     * Convert inline one-word brand to seperated words
     * @param $str
     * @param $separator
     * @return string
     */
    public static function formatBrand($str, $separator = '&#8203')
    {
        return str_replace($separator, '<br>', $str);
    }

    /**
     * Convert Hex to RGB
     * @param $hex
     * @return string
     */
    public static function hexToRgb($hex)
    {
        return implode(',', sscanf($hex, "#%02x%02x%02x"));
    }

    /**
     * Convert array or multidimensional array to str
     * @param $arr
     * @param $separator
     * @param boolean|false $md - Multidimensional
     * @param string $md_key - Key to concatenate
     * @return false|string
     */
    public static function arrToStr($arr, $separator = ',', $md = false, $md_key = false)
    {
        if ($md) {
            $str = '';
            foreach ($arr as $item) {
                $str .= $separator . $item[$md_key];
            }
            return substr($str, 1);
        } else {
            return implode($separator, $arr);
        }
    }

    /**
     * Remove specific symbol from string
     * @param $str
     * @param $symbol
     * @return array|string|string[]
     */
    public static function removeSymbol($str, $symbol)
    {
        return str_replace($symbol, '', $str);
    }

    /**
     * URL SVG encode
     * @param $svg
     * @return array|false|string|string[]
     */
    public static function svgUrlEncode($svg) {
        $data = $svg;
        $data = \preg_replace('/\v(?:[\v\h]+)/', ' ', $data);
        $data = \str_replace('"', "'", $data);
        $data = \rawurlencode($data);
        // re-decode a few characters understood by browsers to improve compression
        $data = \str_replace('%20', ' ', $data);
        $data = \str_replace('%3D', '=', $data);
        $data = \str_replace('%3A', ':', $data);
        $data = \str_replace('%2F', '/', $data);
        return $data;
    }

    /**
     * Generate random string by length
     * @param $length
     * @return string
     */
    public static function generateRandomString($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
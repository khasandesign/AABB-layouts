<?php

namespace helpers;

class Http
{
    /**
     * Get domain name of the current website
     * @return mixed
     */
    public static function getDomain()
    {
        return $_SERVER['SERVER_NAME'];
    }

    /**
     * Check if passed page is active and GET params are matched
     * @param $page
     * @param $params
     * @param $active_class
     * @return bool|mixed|string
     */
    public static function isActive($page, $params = [], $active_class = 'active')
    {
        if (!$active_class) {
            $active_class = true;
        }

        if ($page != $_GET['page']) {
            return false;
        }
        if ($params) {
            foreach ($params as $key => $param) {
                if (!isset($_GET[$key]) || $_GET[$key] != $param) {
                    return false;
                }
            }
        }
        return $active_class;
    }

    public static function extractParam($url, $param)
    {
        $url_parsed = parse_url($url);
        parse_str($url_parsed['query'], $url_parsed);
        return explode(':', $url_parsed[$param])[0];
    }

}
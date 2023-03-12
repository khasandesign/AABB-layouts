<?php
namespace helpers;

class Component
{
    /**
     * Get component by its path and pass props <br>
     * Note: All components have to be located in /components
     * @param $path - path with component name
     * @param array $props - properties available in the included component
     */
    public static function component($path, array $props = [])
    {
        ob_start();
        if ($props) {
            foreach ($props as $key => $prop) {
                ${$key} = $prop;
            }
        }
        include $_SERVER['DOCUMENT_ROOT'] . '/components/' . $path . '.php';
        return ob_get_clean();
    }
}
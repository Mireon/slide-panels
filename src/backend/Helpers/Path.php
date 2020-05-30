<?php

namespace Mireon\SlidePanels\Helpers;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Helpers
 */
class Path
{
    /**
     * ...
     *
     * @param string $path
     *  ...
     *
     * @return string
     */
    public static function resources($path = ''): string
    {
        return __DIR__ . "/../../../resources/$path";
    }

    /**
     * ...
     *
     * @param string $view
     *   ...
     *
     * @return string
     */
    public static function views(string $view): string
    {
        return self::resources("views/$view.php");
    }
}

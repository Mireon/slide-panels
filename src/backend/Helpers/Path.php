<?php

namespace Mireon\SlidePanels\Helpers;

/**
 * The utility for getting paths.
 *
 * @package Mireon\SlidePanels\Helpers
 */
class Path
{
    /**
     * Returns path to resources.
     *
     * @param string $path
     *   An additional path in resource directory.
     *
     * @return string
     */
    public static function resources($path = ''): string
    {
        $resources = __DIR__ . "/../../../resources";

        return empty($path) ? $resources : "$resources/$path";
    }

    /**
     * Returns path to views.
     *
     * @param string $view
     *   A file name of view.
     *
     * @return string
     */
    public static function views(string $view): string
    {
        return self::resources("views/$view.php");
    }
}

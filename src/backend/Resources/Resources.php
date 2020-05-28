<?php

namespace Mireon\SlidePanels\Resources;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Resources
 */
class Resources
{
    /**
     * ...
     *
     * @param string $path
     *  ...
     *
     * @return string
     */
    public static function path($path = ''): string
    {
        return __DIR__ . "/../../../resources/$path";
    }

    /**
     * ...
     *
     * @return string
     */
    public static function styles(): string
    {
        return self::path('assets/styles/slide-panels.min.css');
    }

    /**
     * ...
     *
     * @return string
     */
    public static function script(): string
    {
        return self::path('assets/scripts/slide-panels.min.js');
    }

    /**
     * ...
     *
     * @return string
     */
    public static function config(): string
    {
        return self::path('config/config.php');
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
        return self::path("views/$view.php");
    }
}

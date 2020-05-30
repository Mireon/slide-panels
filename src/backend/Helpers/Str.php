<?php

namespace Mireon\SlidePanels\Helpers;

/**
 * The utility for strings.
 *
 * @package Mireon\SlidePanels\Helpers;
 */
class Str
{
    /**
     * Convert a value to studly caps case.
     *
     * @param string $text
     *   A text.
     *
     * @return string
     */
    public static function studly(string $text): string
    {
        $text = ucwords(str_replace(['-', '_'], ' ', $text));

        return str_replace(' ', '', $text);
    }
}

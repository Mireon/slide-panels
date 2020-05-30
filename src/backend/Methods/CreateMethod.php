<?php

namespace Mireon\SlidePanels\Methods;

/**
 * The factory methods for the class.
 *
 * @package Mireon\YandexTurbo\Traits
 */
trait CreateMethod
{
    /**
     * Creates an instance class.
     *
     * @param array $arguments
     *   An array of arguments.
     *
     * @return static
     */
    public static function create(...$arguments): self
    {
        return new static(...$arguments);
    }
}

<?php

namespace Mireon\SlidePanels\Interfaces;

/**
 * The ability of an object to be validated.
 *
 * @package Mireon\SlidePanels\Interfaces
 */
interface Validated
{
    /**
     * Returns true if an object is valid.
     *
     * @return bool
     */
    public function isValid(): bool;
}

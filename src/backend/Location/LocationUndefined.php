<?php

namespace Mireon\SlidePanels\Location;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Location
 */
class LocationUndefined extends Exception
{
    /**
     * The constructor.
     */
    public function __construct()
    {
        parent::__construct('Location is undefined.');
    }
}

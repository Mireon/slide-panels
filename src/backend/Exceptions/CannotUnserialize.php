<?php

namespace Mireon\SlidePanels\Exceptions;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Exceptions
 */
class CannotUnserialize extends Exception
{
    /**
     * The constructor.
     *
     * @param string $class
     *   ...
     */
    public function __construct(string $class)
    {
        $message = "Cannot unserialize the \"$class\" class.";
        parent::__construct($message);
    }
}

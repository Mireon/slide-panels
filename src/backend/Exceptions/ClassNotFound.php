<?php

namespace Mireon\SlidePanels\Exceptions;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Exceptions
 */
class ClassNotFound extends Exception
{
    /**
     * The constructor.
     *
     * @param string $class
     *   ...
     */
    public function __construct(string $class)
    {
        $message = "Class \"$class\" not found.";
        parent::__construct($message);
    }
}

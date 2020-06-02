<?php

namespace Mireon\SlidePanels\Exceptions;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Exceptions
 */
class FileNotFound extends Exception
{
    /**
     * The constructor.
     *
     * @param string $path
     *   ...
     */
    public function __construct(string $path)
    {
        $message = "File \"$path\" not found.";
        parent::__construct($message);
    }
}

<?php

namespace Mireon\SlidePanels\Builder;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Builder
 */
class EventNotImplementsInterface extends Exception
{
    /**
     * The constructor.
     *
     * @param string $class
     *   ...
     */
    public function __construct(string $class)
    {
        $message = "Class \"$class\" is not a builder event. Implement the \"" . BuilderEvent::class . "\" interface.";
        parent::__construct($message);
    }
}

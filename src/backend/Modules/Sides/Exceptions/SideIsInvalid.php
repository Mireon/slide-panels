<?php

namespace Mireon\SlidePanels\Modules\Sides\Exceptions;

use InvalidArgumentException;
use Mireon\SlidePanels\Modules\Sides\Sides;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Sides\Exceptions
 */
class SideIsInvalid extends InvalidArgumentException
{
    /**
     * The constructor.
     */
    public function __construct()
    {
        $message = "Side value is invalid. The value must be \"" . Sides::LEFT . "\" or \"" . Sides::RIGHT . "\".";
        parent::__construct($message);
    }
}

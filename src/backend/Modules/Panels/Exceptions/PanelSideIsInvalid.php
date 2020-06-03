<?php

namespace Mireon\SlidePanels\Modules\Panels\Exceptions;

use InvalidArgumentException;
use Mireon\SlidePanels\Modules\Panels\Panel;
use Mireon\SlidePanels\Modules\Sides\Sides;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Panels\Exceptions
 */
class PanelSideIsInvalid extends InvalidArgumentException
{
    /**
     * The constructor.
     */
    public function __construct()
    {
        $message = "
            Side value is invalid. 
            The value must be \"" . Panel::SIDE_LEFT . "\" or \"" . Panel::SIDE_RIGHT . "\".
        ";
        parent::__construct($message);
    }
}

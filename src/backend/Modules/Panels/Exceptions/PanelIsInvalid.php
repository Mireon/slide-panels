<?php

namespace Mireon\SlidePanels\Modules\Panels\Exceptions;

use InvalidArgumentException;
use Mireon\SlidePanels\Modules\Panels\Panel;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Panels\Exceptions
 */
class PanelIsInvalid extends InvalidArgumentException
{
    /**
     * The constructor.
     *
     * @param Panel $panel
     *   ...
     */
    public function __construct(Panel $panel)
    {
        $name = get_class($panel);
        $message = "Panel \"$name\" is invalid. Panel must have: a key and a side in the location class.";
        parent::__construct($message);
    }
}

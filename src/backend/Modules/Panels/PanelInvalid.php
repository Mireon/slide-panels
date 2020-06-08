<?php

namespace Mireon\SlidePanels\Modules\Panels;

use InvalidArgumentException;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Panels
 */
class PanelInvalid extends InvalidArgumentException
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

<?php

namespace Mireon\SlidePanels\Modules\Layers\Exceptions;

use InvalidArgumentException;
use Mireon\SlidePanels\Modules\Layers\Layer;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Layers\Exceptions
 */
class LayerIsInvalid extends InvalidArgumentException
{
    /**
     * The constructor.
     *
     * @param Layer $layer
     *   ...
     */
    public function __construct(Layer $layer)
    {
        $name = get_class($layer);
        $message = "Layer \"$name\" is invalid. Layer must have: a key and a panel in the location class.";
        parent::__construct($message);
    }
}

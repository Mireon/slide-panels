<?php

namespace Mireon\SlidePanels\Modules\Layers\Exceptions;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Layers\Exceptions
 */
class LayerIsUndefined extends Exception
{
    /**
     * The constructor.
     */
    public function __construct()
    {
        $message = 'Layer is undefined.';
        parent::__construct($message);
    }
}

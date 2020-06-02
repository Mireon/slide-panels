<?php

namespace Mireon\SlidePanels\Modules\Panels\Exceptions;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Panels\Exceptions
 */
class PanelIsUndefined extends Exception
{
    /**
     * The constructor.
     */
    public function __construct()
    {
        $message = 'Panel is undefined.';
        parent::__construct($message);
    }
}

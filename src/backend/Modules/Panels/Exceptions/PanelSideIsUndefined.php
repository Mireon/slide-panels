<?php

namespace Mireon\SlidePanels\Modules\Panels\Exceptions;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Panels\Exceptions
 */
class PanelSideIsUndefined extends Exception
{
    /**
     * The constructor.
     */
    public function __construct()
    {
        $message = 'Side is undefined.';
        parent::__construct($message);
    }
}

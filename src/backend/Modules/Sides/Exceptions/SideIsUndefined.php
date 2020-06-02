<?php

namespace Mireon\SlidePanels\Modules\Sides\Exceptions;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Sides\Exceptions
 */
class SideIsUndefined extends Exception
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

<?php

namespace Mireon\SlidePanels\Builder;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Builder
 */
class PanelKeyUndefined extends Exception
{
    /**
     * The constructor.
     */
    public function __construct()
    {
        parent::__construct('Panel key is undefined.');
    }
}

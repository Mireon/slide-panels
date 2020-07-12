<?php

namespace Mireon\SlidePanels\Panels;

use Mireon\SlidePanels\SlidePanelsInterface;

/**
 * The panel factory interface.
 *
 * @package Mireon\SlidePanels\Panels
 */
interface PanelFactoryInterface
{
    /**
     * If a return value is true, the "make" method will be called.
     *
     * @return bool
     */
    public function doMake(): bool;

    /**
     * Makes panels or widgets using the panel designer.
     *
     * @param SlidePanelsInterface $slidePanels
     *   The slider of panels.
     *
     * @return void
     */
    public function make(SlidePanelsInterface $slidePanels): void;
}

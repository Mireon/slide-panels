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
     * If true is returned, the "make" method will be called.
     *
     * @return bool
     */
    public function doMake(): bool;

    /**
     * Make panels and add widgets.
     *
     * @param SlidePanelsInterface $slidePanels
     *   The "SlidePanel" instance.
     *
     * @return void
     */
    public function make(SlidePanelsInterface $slidePanels): void;
}

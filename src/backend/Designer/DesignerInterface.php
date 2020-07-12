<?php

namespace Mireon\SlidePanels\Designer;

use Mireon\SlidePanels\Panels\PanelInterface;
use Mireon\SlidePanels\Renderer\Renderable;

/**
 * The interface for designer.
 *
 * @package Mireon\SlidePanels\Designer
 */
interface DesignerInterface extends Renderable
{
    /**
     * Returns a panel by key.

     * @param string $key
     *   A panel key.
     *
     * @return PanelInterface
     */
    public function getPanel(string $key): PanelInterface;
}

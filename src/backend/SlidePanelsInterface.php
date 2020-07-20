<?php

namespace Mireon\SlidePanels;

use Mireon\SlidePanels\Panels\PanelInterface;
use Mireon\SlidePanels\Renderer\Renderable;

/**
 * The interface for general class.
 *
 * @package Mireon\SlidePanels
 */
interface SlidePanelsInterface extends Renderable
{
    /**
     * Returns an instance this class.
     *
     * @return static
     */
    public static function getInstance(): self;

    /**
     * Returns a panel by key.

     * @param string $key
     *   A panel key.
     *
     * @return PanelInterface
     */
    public function getPanel(string $key): PanelInterface;
}

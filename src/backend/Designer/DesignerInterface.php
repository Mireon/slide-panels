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
    public function panel(string $key): PanelInterface;

    /**
     * Adds a new factory object to the list.
     *
     * @param mixed $factory
     *   A factory.
     *
     * @return self
     */
    public function factory($factory): self;

    /**
     * Adds a list factories object to the list.
     *
     * @param mixed[] $factories
     *   A list of factory objects or factory class names.
     *
     * @return self
     */
    public function factories(array $factories): self;
}

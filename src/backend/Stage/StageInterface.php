<?php

namespace Mireon\SlidePanels\Stage;

use Mireon\SlidePanels\Panels\PanelsInterface;
use Mireon\SlidePanels\Renderer\Renderable;

/**
 * The stage interface.
 *
 * @package Mireon\SlidePanels\Stage
 */
interface StageInterface extends Renderable
{
    /**
     * Returns the panels container.
     *
     * @return PanelsInterface|null
     */
    public function getPanels(): ?PanelsInterface;

    /**
     * Checks if panels exists.
     *
     * @return bool
     */
    public function hasPanels(): bool;
}

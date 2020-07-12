<?php

namespace Mireon\SlidePanels\Panels;

use Mireon\SlidePanels\Renderer\Renderable;

/**
 * The panels container interface.
 *
 * @package Mireon\SlidePanels\Panels
 */
interface PanelsInterface extends Renderable
{
    /**
     * Returns the list panels.
     *
     * @return PanelInterface[]
     */
    public function getPanels(): array;

    /**
     * Checks if panels exists.
     *
     * @return bool
     */
    public function hasPanels(): bool;

    /**
     * Returns a panel by key.
     *
     * @param string $key
     *   A panel key.
     *
     * @return PanelInterface|null
     */
    public function getPanel(string $key): ?PanelInterface;

    /**
     * Checks if panel exists.
     *
     * @param string $key
     *   A panel key.
     *
     * @return bool
     */
    public function hasPanel(string $key): bool;
}

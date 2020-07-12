<?php

namespace Mireon\SlidePanels\Panels;

use Mireon\SlidePanels\Interfaces\Validated;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Widgets\Widgets;
use Mireon\SlidePanels\Widgets\WidgetsInterface;

/**
 * The panel interface.
 *
 * @package Mireon\SlidePanels\Panels
 */
interface PanelInterface extends Renderable, Validated
{
    /**
     * Returns a panel key.
     *
     * @return string|null
     */
    public function getKey(): ?string;

    /**
     * Checks if a panel key is defined.
     *
     * @return bool
     */
    public function hasKey(): bool;

    /**
     * Returns the panel side.
     *
     * @return string
     */
    public function getSide(): ?string;

    /**
     * Checks if a panel side is defined.
     *
     * @return bool
     */
    public function hasSide(): bool;

    /**
     * Returns the custom style of panel.
     *
     * @return PanelParamsInterface|null
     */
    public function getParams(): ?PanelParamsInterface;

    /**
     * Checks if the panel style is defined.
     *
     * @return bool
     */
    public function hasParams(): bool;

    /**
     * Returns the widgets container.
     *
     * @return WidgetsInterface|null
     */
    public function getWidgets(): ?WidgetsInterface;

    /**
     * Checks if widgets exists.
     *
     * @return bool
     */
    public function hasWidgets(): bool;
}

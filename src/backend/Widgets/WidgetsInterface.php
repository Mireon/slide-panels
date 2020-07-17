<?php

namespace Mireon\SlidePanels\Widgets;

use Mireon\SlidePanels\Renderer\Renderable;

/**
 * The widgets container interface.
 *
 * @package Mireon\SlidePanels\Widgets
 */
interface WidgetsInterface extends Renderable
{
    /**
     * Returns the list of widgets.
     *
     * @return WidgetInterface[]
     */
    public function getWidgets(): array;

    /**
     * Checks if widgets exists.
     *
     * @return bool
     */
    public function hasWidgets(): bool;

    /**
     * Returns a widget with by key.
     *
     * @param string $key
     *   A widget key.
     *
     * @return WidgetInterface|null
     */
    public function getWidget(string $key): ?WidgetInterface;

    /**
     * Indicates if a widget with the key is exists.
     *
     * @param string $key
     *   A widget key.
     *
     * @return bool
     */
    public function hasWidget(string $key): bool;
}

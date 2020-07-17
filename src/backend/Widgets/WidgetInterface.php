<?php

namespace Mireon\SlidePanels\Widgets;

use Mireon\SlidePanels\Interfaces\Validated;
use Mireon\SlidePanels\Renderer\Renderable;

/**
 * The widget interface.
 *
 * @package Mireon\SlidePanels\Widgets
 */
interface WidgetInterface extends Renderable, Validated
{
    /**
     * Returns the widget key.
     *
     * @return string|null
     */
    public function getKey(): ?string;

    /**
     * Indicate if the widget key is defined.
     *
     * @return bool
     */
    public function hasKey(): bool;

    /**
     * Returns the widget weight.
     *
     * @return int
     */
    public function getWeight(): int;
}

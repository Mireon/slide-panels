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
     * The widget weight.
     *
     * @return int
     */
    public function getWeight(): int;
}

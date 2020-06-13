<?php

namespace Mireon\SlidePanels\Widgets;

use Mireon\SlidePanels\Interfaces\Validated;
use Mireon\SlidePanels\Renderer\Renderable;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Widgets
 */
interface WidgetInterface extends Renderable, Validated
{
    /**
     * ...
     *
     * @return int
     */
    public function getWeight(): int;
}

<?php

namespace Mireon\SlidePanels\Widgets;

use Mireon\SlidePanels\Renderer\Renderable;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Widgets
 */
interface WidgetInterface extends Renderable
{
    /**
     * ...
     *
     * @return int
     */
    public function getWeight(): int;

    /**
     * ...
     *
     * @return bool
     */
    public function isValid(): bool;
}

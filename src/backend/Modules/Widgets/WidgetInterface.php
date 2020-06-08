<?php

namespace Mireon\SlidePanels\Modules\Widgets;

use Mireon\SlidePanels\Renderer\Renderable;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets
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

<?php

namespace Mireon\SlidePanels\Modules\Widgets;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets
 */
interface WidgetInterface
{
    /**
     * ...
     *
     * @return bool
     */
    public function isValid(): bool;

    /**
     * ...
     *
     * @return string
     */
    public function render(): string;
}

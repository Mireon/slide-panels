<?php

namespace Mireon\SlidePanels\Modules\Widgets;

use Mireon\SlidePanels\Location\Location;

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
     * @return Location
     */
    public function getLocation(): Location;

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

    /**
     * ...
     *
     * @return string
     */
    public function render(): string;
}

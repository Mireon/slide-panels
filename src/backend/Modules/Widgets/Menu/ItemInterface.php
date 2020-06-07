<?php

namespace Mireon\SlidePanels\Modules\Widgets\Menu;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets\Menu
 */
interface ItemInterface
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

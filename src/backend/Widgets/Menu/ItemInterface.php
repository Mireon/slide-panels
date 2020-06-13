<?php

namespace Mireon\SlidePanels\Widgets\Menu;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Widgets\Menu
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

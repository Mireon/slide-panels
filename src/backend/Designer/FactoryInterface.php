<?php

namespace Mireon\SlidePanels\Designer;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Designer
 */
interface FactoryInterface
{
    /**
     * ...
     *
     * @return bool
     */
    public function doMake(): bool;

    /**
     * ...
     *
     * @param Designer $designer
     *   ...
     *
     * @return void
     */
    public function make(Designer $designer): void;
}

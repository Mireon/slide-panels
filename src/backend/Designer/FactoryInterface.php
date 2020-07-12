<?php

namespace Mireon\SlidePanels\Designer;

/**
 * The factory interface.
 *
 * @package Mireon\SlidePanels\Designer
 */
interface FactoryInterface
{
    /**
     * If a return value is true, the "make" method will be called.
     *
     * @return bool
     */
    public function doMake(): bool;

    /**
     * Makes panels or widgets using the panel designer.
     *
     * @param DesignerInterface $designer
     *   The panels designer.
     *
     * @return void
     */
    public function make(DesignerInterface $designer): void;
}

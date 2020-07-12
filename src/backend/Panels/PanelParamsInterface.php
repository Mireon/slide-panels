<?php

namespace Mireon\SlidePanels\Panels;

use Mireon\SlidePanels\Interfaces\Validated;
use Mireon\SlidePanels\Renderer\Renderable;

/**
 * The panel style interface.
 *
 * @package Mireon\SlidePanels\Panels
 */
interface PanelParamsInterface extends Renderable, Validated
{
    /**
     * Sets the panel width.
     *
     * @param int $width
     *   A panel width.
     *
     * @return void
     */
    public function setWidth(int $width): void;

    /**
     * Returns the panel width.
     *
     * @return int
     */
    public function getWidth(): int;

    /**
     * If true, styles print.
     *
     * @return bool
     */
    public function doUse(): bool;
}

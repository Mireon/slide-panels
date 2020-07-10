<?php

namespace Mireon\SlidePanels\Renderer;

/**
 * The ability of an object to be rendered.
 *
 * @package Mireon\SlidePanels\Renderer
 */
interface Renderable
{
    /**
     * Returns object as string.
     *
     * @return string
     */
    public function render(): string;
}

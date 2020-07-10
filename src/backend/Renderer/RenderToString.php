<?php

namespace Mireon\SlidePanels\Renderer;

/**
 * The ability of an object to render if the object is used as a string.
 *
 * @package Mireon\SlidePanels\Renderer
 */
trait RenderToString
{
    /**
     * Renders object if the object is used as a string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}

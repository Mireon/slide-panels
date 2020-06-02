<?php

namespace Mireon\SlidePanels\Renderer;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Renderer
 */
trait RenderToString
{
    /**
     * ...
     *
     * @return string
     */
    public function __toString(): string
    {
        return method_exists($this, 'render') ? $this->render() : '';
    }
}

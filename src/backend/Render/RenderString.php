<?php

namespace Mireon\SlidePanels\Render;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Traits
 */
trait RenderString
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

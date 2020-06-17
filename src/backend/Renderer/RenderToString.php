<?php

namespace Mireon\SlidePanels\Renderer;

use Exception;

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
     *
     * @throws Exception
     */
    public function __toString(): string
    {
        if (!method_exists($this, 'render')) {
            throw new Exception('Method "render" not found.');
        }

        return $this->render();
    }
}

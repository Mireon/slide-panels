<?php

namespace Mireon\SlidePanels\Renderer;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Renderer
 */
interface RendererInterface {
    /**
     * ...
     *
     * @param mixed $object
     *   ...
     *
     * @return string
     */
    public function render($object): string;
}

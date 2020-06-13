<?php

namespace Mireon\SlidePanels\Levers;

use Exception;
use Mireon\SlidePanels\Renderer\RendererDefault;
use Mireon\SlidePanels\Renderer\RendererInterface;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Levers
 */
class LeverRenderer implements RendererInterface
{
    /**
     * @inheritDoc
     *
     * @param Lever $lever
     *   ...
     *
     * @throws Exception
     */
    public function render($lever): string
    {
        return RendererDefault::view("levers/{$lever->getType()}", ['lever' => $lever]);
    }
}

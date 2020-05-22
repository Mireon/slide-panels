<?php

namespace Mireon\SlidePanels\Components\Sides;

use Exception;
use Mireon\SlidePanels\Properties\Side;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Components\Sides
 */
class Collapser implements Renderable
{
    use RenderString;
    use Side;

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Render::view('sides/collapser', ['collapser' => $this]);
    }
}

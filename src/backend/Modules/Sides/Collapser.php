<?php

namespace Mireon\SlidePanels\Modules\Sides;

use Exception;
use Mireon\SlidePanels\Properties\SideProperty;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Sides
 */
class Collapser implements Renderable
{
    use RenderString;
    use SideProperty;

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

<?php

namespace Mireon\SlidePanels\Modules\Sides\Components;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Properties\SideProperty;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Sides\Components
 */
class Collapser implements Renderable
{
    use RenderToString;
    use SideProperty;

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('sides/collapser', ['collapser' => $this]);
    }
}

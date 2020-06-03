<?php

namespace Mireon\SlidePanels\Modules\Layers\Components;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Properties\TextProperty;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Layers\Components
 */
class Back implements Renderable
{
    use RenderToString;
    use TextProperty;

    /**
     * ...
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->hasText();
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('layers/back', ['back' => $this]);
    }
}

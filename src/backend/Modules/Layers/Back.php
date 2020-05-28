<?php

namespace Mireon\SlidePanels\Modules\Layers;

use Exception;
use Mireon\SlidePanels\Properties\Text;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Layers
 */
class Back implements Renderable
{
    use RenderString;
    use Text;

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
     * @throws Exception
     */
    public function render(): string
    {
        return Render::view('sides/collapser', ['collapser' => $this]);
    }
}

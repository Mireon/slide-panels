<?php

namespace Mireon\SlidePanels\Modules\Panels;

use Mireon\SlidePanels\Renders\Renderable;

class Panels implements Renderable
{
    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return 'panels';
    }

    /**
     * ...
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}

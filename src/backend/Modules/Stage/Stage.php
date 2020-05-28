<?php

namespace Mireon\SlidePanels\Modules\Stage;

use Exception;
use Mireon\SlidePanels\Modules\Sides\Sides;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Stage
 */
class Stage implements Renderable
{
    use RenderString;

    /**
     * ...
     *
     * @var Sides|null $sides
     */
    private ?Sides $sides = null;

    /**
     * ...
     *
     * @param Sides $sides
     *   ...
     *
     * @return void
     */
    public function setSides(Sides $sides): void
    {
        $this->sides = $sides;
    }

    /**
     * ...
     *
     * @return Sides
     */
    public function getSides(): ?Sides
    {
        return $this->sides;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasSides(): bool
    {
        return !is_null($this->sides) && ($this->sides->hasLeft() || $this->sides->hasRight());
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Render::view('stage/stage', ['stage' => $this]);
    }
}

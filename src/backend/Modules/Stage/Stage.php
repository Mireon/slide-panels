<?php

namespace Mireon\SlidePanels\Modules\Stage;

use Mireon\SlidePanels\Modules\Sides\Sides;
use Mireon\SlidePanels\Renders\Renderable;
use Mireon\SlidePanels\View\View;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Stage
 */
class Stage implements Renderable
{
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
        return !is_null($this->sides) && $this->sides->hasSide();
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return View::view('stage', [
            'stage' => $this,
        ]);
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

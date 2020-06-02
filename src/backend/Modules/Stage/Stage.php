<?php

namespace Mireon\SlidePanels\Modules\Stage;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Modules\Sides\Sides;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Stage
 */
class Stage implements Renderable
{
    use RenderToString;

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
     * @return Sides|null
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
        return !is_null($this->sides);
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('stage/stage', ['stage' => $this]);
    }
}

<?php

namespace Mireon\SlidePanels\Stage;

use Mireon\SlidePanels\Panels\Panels;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * The stage.
 *
 * @package Mireon\SlidePanels\Stage
 */
class Stage implements Renderable
{
    use RenderToString;

    /**
     * The panels container.
     *
     * @var Panels|null
     */
    private ?Panels $panels = null;

    /**
     * Creates the stage.
     *
     * @return static
     */
    public static function create(): self
    {
        return new static();
    }

    /**
     * The panels container.
     *
     * @param Panels $panels
     *   A panels container.
     *
     * @return void
     */
    public function setPanels(Panels $panels): void
    {
        $this->panels = $panels;
    }

    /**
     * Returns the panels container.
     *
     * @return Panels|null
     */
    public function getPanels(): ?Panels
    {
        return $this->panels;
    }

    /**
     * Checks if panels exists.
     *
     * @return bool
     */
    public function hasPanels(): bool
    {
        return !is_null($this->panels);
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return Renderer::render('stage/stage', ['stage' => $this]);
    }
}

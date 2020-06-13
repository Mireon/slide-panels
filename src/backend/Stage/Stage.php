<?php

namespace Mireon\SlidePanels\Stage;

use Exception;
use Mireon\SlidePanels\Panels\Panels;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Stage
 */
class Stage implements Renderable
{
    use RenderToString;

    /**
     * ...
     *
     * @var Panels|null $panels
     */
    private ?Panels $panels = null;

    /**
     * ...
     *
     * @param Panels $panels
     *   ...
     *
     * @return void
     */
    public function setPanels(Panels $panels): void
    {
        $this->panels = $panels;
    }

    /**
     * ...
     *
     * @return Panels|null
     */
    public function getPanels(): ?Panels
    {
        return $this->panels;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasPanels(): bool
    {
        return !is_null($this->panels);
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Renderer::view('stage/stage', ['stage' => $this]);
    }
}

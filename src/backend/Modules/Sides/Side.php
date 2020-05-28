<?php

namespace Mireon\SlidePanels\Modules\Sides;

use Exception;
use Mireon\SlidePanels\Modules\Panels\Panels;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Sides
 */
abstract class Side implements Renderable
{
    use RenderString;

    /**
     * ...
     *
     * @var Collapser|null
     */
    private ?Collapser $collapser = null;

    /**
     * ...
     *
     * @var Panels|null $panels
     */
    private ?Panels $panels = null;

    /**
     * ...
     *
     * @return string
     */
    abstract public function getSide(): string;

    /**
     * ...
     *
     * @param Collapser $collapser
     *   ...
     *
     * @return void
     */
    public function setCollapser(Collapser $collapser): void
    {
        $this->collapser = $collapser;
    }

    /**
     * @return Collapser|null
     */
    public function getCollapser(): ?Collapser
    {
        return $this->collapser;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasCollapser(): bool
    {
        return !is_null($this->collapser);
    }

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
        return !is_null($this->panels) && $this->panels->hasPanels();
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Render::view('sides/side', ['side' => $this]);
    }
}

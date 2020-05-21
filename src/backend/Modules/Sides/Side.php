<?php

namespace Mireon\SlidePanels\Modules\Sides;

use Mireon\SlidePanels\Modules\Panels\Panels;
use Mireon\SlidePanels\Renders\Renderable;
use Mireon\SlidePanels\View\View;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Sides
 */
abstract class Side implements Renderable
{
    /**
     * ...
     *
     * @var bool
     */
    private bool $hasCloseButton = true;

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
    public abstract function getSide(): string;

    /**
     * ...
     *
     * @return bool
     */
    public function hasCloseButton(): bool
    {
        return $this->hasCloseButton;
    }

    /**
     * ...
     *
     * @param bool $enabled
     *   ...
     *
     * @return void
     */
    public function setCloseButton(bool $enabled = true): void
    {
        $this->hasCloseButton = $enabled;
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
        return true;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return View::view('side', [
            'side' => $this,
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

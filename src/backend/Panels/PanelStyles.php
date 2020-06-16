<?php

namespace Mireon\SlidePanels\Panels;

use Exception;
use Mireon\SlidePanels\Interfaces\Validated;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * The panel styles container.
 *
 * @package Mireon\SlidePanels\Panels
 */
class PanelStyles implements Renderable, Validated
{
    use RenderToString;

    /**
     * The panel.
     *
     * @var Panel|null
     */
    private ?Panel $panel = null;

    /**
     * The panel width.
     *
     * @var int
     */
    private int $width = 320;

    /**
     * The constructor.
     *
     * @param Panel $panel
     *   A panel.
     */
    public function __construct(Panel $panel)
    {
        $this->panel = $panel;
    }

    /**
     * Sets the panel width.
     *
     * @param int $width
     *   A panel width.
     *
     * @return self
     *
     * @throws Exception
     */
    public function width(int $width): self
    {
        $this->setWidth($width);

        return $this;
    }

    /**
     * Sets the panel width.
     *
     * @param int $width
     *   A panel width.
     *
     * @return void
     *
     * @throws Exception
     */
    public function setWidth(int $width): void
    {
        if ($width < 0) {
            throw new Exception('Panel width must be a positive number.');
        }

        $this->width = $width;
    }

    /**
     * Returns the panel width.
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Renderer::view('panels/panel-styles', [
            'panel' => $this->panel,
            'styles' => $this,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return !is_null($this->panel) && $this->panel->isValid();
    }

    /**
     * If true, styles print.
     *
     * @return bool
     */
    public function doUse(): bool
    {
        return $this->width !== 320;
    }
}

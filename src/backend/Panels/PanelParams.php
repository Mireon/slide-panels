<?php

namespace Mireon\SlidePanels\Panels;

use Exception;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * The panel styles container.
 *
 * @package Mireon\SlidePanels\Panels
 */
class PanelParams implements PanelParamsInterface
{
    use RenderToString;

    /**
     * The panel.
     *
     * @var PanelInterface|null
     */
    private ?PanelInterface $panel = null;

    /**
     * The panel width.
     *
     * @var int
     */
    private int $width = 320;

    /**
     * The constructor.
     *
     * @param PanelInterface $panel
     *   A panel.
     */
    public function __construct(PanelInterface $panel)
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
     * @inheritDoc
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
     * @inheritDoc
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return Renderer::render('panels/panel-params', [
            'panel' => $this->panel,
            'params' => $this,
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
     * @inheritDoc
     */
    public function doUse(): bool
    {
        return $this->width !== 320;
    }
}

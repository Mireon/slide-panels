<?php

namespace Mireon\SlidePanels\Stage;

use Mireon\SlidePanels\Panels\PanelsInterface;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * The stage.
 *
 * @package Mireon\SlidePanels\Stage
 */
class Stage implements StageInterface
{
    use RenderToString;

    /**
     * The panels container.
     *
     * @var PanelsInterface|null
     */
    private ?PanelsInterface $panels = null;

    /**
     * The constructor.
     *
     * @param PanelsInterface|null $panels
     *   The panels container.
     */
    public function __construct(?PanelsInterface $panels = null)
    {
        $this->panels = $panels;
    }

    /**
     * Creates the stage.
     *
     * @param PanelsInterface|null $panels
     *   The panels container.
     *
     * @return self
     */
    public static function create(?PanelsInterface $panels = null): self
    {
        return new self($panels);
    }

    /**
     * The panels container.
     *
     * @param PanelsInterface $panels
     *   A panels container.
     *
     * @return self
     */
    public function panels(PanelsInterface $panels): self
    {
        $this->setPanels($panels);

        return $this;
    }

    /**
     * The panels container.
     *
     * @param PanelsInterface $panels
     *   A panels container.
     *
     * @return void
     */
    public function setPanels(PanelsInterface $panels): void
    {
        $this->panels = $panels;
    }

    /**
     * @inheritDoc
     */
    public function getPanels(): ?PanelsInterface
    {
        return $this->panels;
    }

    /**
     * @inheritDoc
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

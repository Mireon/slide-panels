<?php

namespace Mireon\SlidePanels\Panels;

use ArrayIterator;
use Exception;
use IteratorAggregate;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;
use Traversable;

/**
 * The panels container.
 *
 * @package Mireon\SlidePanels\Panels
 */
class Panels implements PanelsInterface, IteratorAggregate
{
    use RenderToString;

    /**
     * The list of panels.
     *
     * @var PanelInterface[]
     */
    private array $panels = [];

    /**
     * The constructor.
     *
     * @param PanelInterface[] $panels
     *   A list of panels.
     *
     * @throws Exception
     */
    public function __construct(array $panels = [])
    {
        $this->setPanels($panels);
    }

    /**
     * Creates panels container.
     *
     * @param PanelInterface[] $panels
     *   A list of panels.
     *
     * @return static
     *
     * @throws Exception
     */
    public static function create(array $panels = []): self
    {
        return new static($panels);
    }

    /**
     * Sets a list of panels.
     *
     * @param PanelInterface[] $panels
     *   A list of panels.
     *
     * @return self
     *
     * @throws Exception
     */
    public function panels(array $panels): self
    {
        $this->setPanels($panels);

        return $this;
    }

    /**
     * Sets a list of panels.
     *
     * @param PanelInterface[] $panels
     *   A list of panels.
     *
     * @return void
     *
     * @throws Exception
     */
    public function setPanels(array $panels): void
    {
        $this->reset();

        foreach ($panels as $panel) {
            $this->addPanel($panel);
        }
    }

    /**
     * Sets a list of panels.
     *
     * @param PanelInterface $panel
     *   A panel.
     *
     * @return self
     *
     * @throws Exception
     */
    public function panel(PanelInterface $panel): self
    {
        $this->addPanel($panel);

        return $this;
    }

    /**
     * Adds a new panel to the list.
     *
     * @param PanelInterface $panel
     *   A new panel.
     *
     * @return void
     *
     * @throws Exception
     */
    public function addPanel(PanelInterface $panel): void
    {
        if (!$panel->isValid()) {
            throw new Exception('Panel is invalid.');
        }

        $this->panels[$panel->getKey()] = $panel;
    }

    /**
     * @inheritDoc
     */
    public function getPanels(): array
    {
        return $this->panels;
    }

    /**
     * @inheritDoc
     */
    public function hasPanels(): bool
    {
        return !empty($this->panels);
    }

    /**
     * @inheritDoc
     */
    public function getPanel(string $key): ?PanelInterface
    {
        return $this->hasPanel($key) ? $this->panels[$key] : null;
    }

    /**
     * @inheritDoc
     */
    public function hasPanel(string $key): bool
    {
        return isset($this->panels[$key]);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->getPanels());
    }

    /**
     * Resets the list a panels.
     */
    public function reset(): void
    {
        $this->panels = [];
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return Renderer::render('panels/panels', ['panels' => $this]);
    }
}

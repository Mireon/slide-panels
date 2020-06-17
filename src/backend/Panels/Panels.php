<?php

namespace Mireon\SlidePanels\Panels;

use ArrayIterator;
use Exception;
use IteratorAggregate;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;
use Traversable;

/**
 * The panels container.
 *
 * @package Mireon\SlidePanels\Panels
 */
class Panels implements Renderable, IteratorAggregate
{
    use RenderToString;

    /**
     * The list of panels.
     *
     * @var Panel[]
     */
    private array $panels = [];

    /**
     * The constructor.
     *
     * @param Panel[] $panels
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
     * @param array $panels
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
     * @param Panel[] $panels
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
     * @param Panel[] $panels
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
     * Adds a new panel to the list.
     *
     * @param Panel $panel
     *   A new panel.
     *
     * @return void
     *
     * @throws Exception
     */
    public function addPanel(Panel $panel): void
    {
        if (!$panel->isValid()) {
            throw new Exception('Panel is invalid.');
        }

        $this->panels[$panel->getKey()] = $panel;
    }

    /**
     * Checks if panels exists.
     *
     * @return bool
     */
    public function hasPanels(): bool
    {
        return !empty($this->panels);
    }

    /**
     * Checks if panel exists.
     *
     * @param string $key
     *   A panel key.
     *
     * @return bool
     */
    public function hasPanel(string $key): bool
    {
        return isset($this->panels[$key]);
    }

    /**
     * Returns a panel by key.
     *
     * @param string $key
     *   A panel key.
     *
     * @return Panel|null
     */
    public function getPanel(string $key): ?Panel
    {
        return $this->hasPanel($key) ? $this->panels[$key] : null;
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->panels);
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
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Renderer::view('panels/panels', ['panels' => $this]);
    }
}

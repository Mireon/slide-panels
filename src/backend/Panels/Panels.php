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
 * ...
 *
 * @package Mireon\SlidePanels\Panels
 */
class Panels implements Renderable, IteratorAggregate
{
    use RenderToString;

    /**
     * ...
     *
     * @var Panel[] $panels
     */
    private array $panels = [];

    /**
     * The constructor.
     *
     * @param Panel[] $panels
     *   ...
     *
     * @throws Exception
     */
    public function __construct(array $panels = [])
    {
        $this->setPanels($panels);
    }

    /**
     * ...
     *
     * @param array $panels
     *   ...
     *
     * @return self
     *
     * @throws Exception
     */
    public static function create(array $panels = []): self
    {
        return new self($panels);
    }

    /**
     * ...
     *
     * @param Panel[] $panels
     *   ...
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
     * ...
     *
     * @param Panel[] $panels
     *   ...
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
     * ...
     *
     * @param Panel $panel
     *   ...
     *
     * @return void
     *
     * @throws Exception
     */
    public function addPanel(Panel $panel): void
    {
        if ($panel->isValid()) {
            $this->panels[$panel->getKey()] = $panel;
        } else {
            throw new Exception('The panel must have a key.');
        }
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasPanels(): bool
    {
        return !empty($this->panels);
    }

    /**
     * ...
     *
     * @param string $key
     *   ...
     *
     * @return bool
     */
    public function hasPanel(string $key): bool
    {
        return isset($this->panels[$key]);
    }

    /**
     * ...
     *
     * @param string $key
     *   ...
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
     *
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

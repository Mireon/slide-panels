<?php

namespace Mireon\SlidePanels\Modules\Panels;

use ArrayIterator;
use IteratorAggregate;
use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;
use Traversable;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Panels
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
     * ...
     *
     * @param Panel $panel
     *   ...
     *
     * @return void
     */
    public function addPanel(Panel $panel): void
    {
        if ($panel->isValid()) {
            $this->panels[$panel->getKey()] = $panel;
        } else {
            throw new PanelInvalid($panel);
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
        if (!$this->hasPanel($key)) {
            return null;
        }

        return $this->panels[$key];
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('panels/panels', ['panels' => $this]);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->panels);
    }
}

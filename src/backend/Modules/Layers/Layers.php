<?php

namespace Mireon\SlidePanels\Modules\Layers;

use ArrayIterator;
use Exception;
use IteratorAggregate;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;
use Traversable;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Layers
 */
class Layers implements Renderable, IteratorAggregate
{
    use RenderString;

    /**
     * ...
     *
     * @var Layer[] $layers
     */
    private array $layers = [];

    /**
     * ...
     *
     * @param Layer $layer
     *   ...
     *
     * @return void
     */
    public function addLayer(Layer $layer): void
    {
        if ($layer->isValid()) {
            $this->layers[] = $layer;
        }
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasLayers(): bool
    {
        return !empty($this->layers);
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Render::view('layers/layers', ['layers' => $this]);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->layers);
    }
}

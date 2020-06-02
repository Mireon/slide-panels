<?php

namespace Mireon\SlidePanels\Modules\Layers;

use ArrayIterator;
use IteratorAggregate;
use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Modules\Layers\Exceptions\LayerIsInvalid;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;
use Traversable;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Layers
 */
class Layers implements Renderable, IteratorAggregate
{
    use RenderToString;

    /**
     * ...
     *
     * @var Layer[] $layers
     */
    private array $layers = [];

    /**
     * ...
     *
     * @param array $layers
     *   ...
     *
     * @return void
     */
    public function setLayers(array $layers): void
    {
        $this->layers = [];

        foreach ($layers as $layer) {
            $this->addLayer($layer);
        }
    }

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
        if (!$layer->isValid()) {
            throw new LayerIsInvalid($layer);
        }

        $this->layers[$layer->getKey()] = $layer;
    }

    /**
     * ...
     *
     * @return array
     */
    public function getLayers(): array
    {
        return $this->layers;
    }

    /**
     * ...
     *
     * @param string $key
     *   ...
     *
     * @return Layer|null
     */
    public function getLayer(string $key): ?Layer
    {
        if (!$this->hasLayer($key)) {
            return null;
        }

        return $this->layers[$key];
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
     * ...
     *
     * @param string $key
     *   ...
     *
     * @return bool
     */
    public function hasLayer(string $key): bool
    {
        return isset($this->layers[$key]);
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('layers/layers', ['layers' => $this]);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->layers);
    }
}

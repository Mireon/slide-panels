<?php

namespace Mireon\SlidePanels\Target;

use Mireon\SlidePanels\Methods\CreateMethod;
use Mireon\SlidePanels\Modules\Sides\Sides;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Target
 */
class Target
{
    use CreateMethod;

    /**
     * ...
     *
     * @var string|null $side
     */
    private ?string $side = null;

    /**
     * ...
     *
     * @var string|null $panel
     */
    private ?string $panel = null;

    /**
     * ...
     *
     * @var array $layers
     */
    private array $layers = [];

    /**
     * ...
     *
     * @param string $side
     *   ...
     *
     * @return self
     */
    public function side(string $side): self
    {
        $this->setSide($side);

        return $this;
    }

    /**
     * ...
     *
     * @param string $side
     *   ...
     *
     * @return void
     */
    public function setSide(string $side): void
    {
        switch ($side) {
            case Sides::LEFT:
            case Sides::RIGHT:
                $this->side = $side;
        }
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getSide(): ?string
    {
        return $this->side;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasSide(): bool {
        return !is_null($this->side);
    }

    /**
     * ...
     *
     * @param string $panel
     *   ...
     *
     * @return self
     */
    public function panel(string $panel): self
    {
        $this->setPanel($panel);

        return $this;
    }

    /**
     * ...
     *
     * @param string $panel
     *   ...
     *
     * @return void
     */
    public function setPanel(string $panel): void
    {
        $this->panel = $panel ?: null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getPanel(): ?string
    {
        return $this->panel;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasPanel(): bool
    {
        return !is_null($this->panel);
    }

    /**
     * ...
     *
     * @param array $layers
     *   ...
     *
     * @return self
     */
    public function layers(array $layers): self
    {
        $this->setLayers($layers);

        return $this;
    }

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
     * @param string $layer
     *   ...
     *
     * @return self
     */
    public function layer(string $layer): self
    {
        $this->addLayer($layer);

        return $this;
    }

    /**
     * ...
     *
     * @param string $layer
     *   ...
     *
     * @return void
     */
    public function addLayer(string $layer): void
    {
        if (!empty($layer)) {
            $this->layers[] = $layer;
        }
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
}

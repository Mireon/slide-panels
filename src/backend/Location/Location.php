<?php

namespace Mireon\SlidePanels\Location;

use Mireon\SlidePanels\Methods\CreateMethod;
use Mireon\SlidePanels\Modules\Sides\Exceptions\SideIsInvalid;
use Mireon\SlidePanels\Modules\Sides\Sides;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Location
 */
class Location
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
     * @var string|null $layer
     */
    private ?string $layer = null;

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
                break;
            default:
                throw new SideIsInvalid;
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
    public function hasSide(): bool
    {
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
     * @param string $layer
     *   ...
     *
     * @return self
     */
    public function layer(string $layer): self
    {
        $this->setLayer($layer);

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
    public function setLayer(string $layer): void
    {
        $this->layer = $layer ?: null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getLayer(): ?string
    {
        return $this->layer;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasLayer(): bool
    {
        return !is_null($this->layer);
    }

    /**
     * ...
     *
     * @return Location
     */
    public function createForPanel(): Location
    {
        $location = new Location();
        $location->setSide($this->getSide());
        $location->setPanel($this->getPanel());

        return $location;
    }

    /**
     * ...
     *
     * @return Location
     */
    public function createForLayer(): Location
    {
        return clone $this;
    }
}

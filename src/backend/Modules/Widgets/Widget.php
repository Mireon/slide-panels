<?php

namespace Mireon\SlidePanels\Modules\Widgets;

use Mireon\SlidePanels\Location\Location;
use Mireon\SlidePanels\Location\LocationUndefined;
use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets
 */
abstract class Widget implements WidgetInterface
{
    use RenderToString;

    /**
     * ...
     *
     * @var Location|null $location
     */
    private ?Location $location = null;

    /**
     * ...
     *
     * @var int $weight
     */
    private int $weight = 0;

    /**
     * ...
     *
     * @param Location $location
     *   ...
     *
     * @return self
     */
    public function location(Location $location): self
    {
        $this->setLocation($location);

        return $this;
    }

    /**
     * ...
     *
     * @param Location $location
     *   ...
     *
     * @return void
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    /**
     * ...
     *
     * @return Location
     *
     * @throws LocationUndefined
     */
    public function getLocation(): Location
    {
        if (!$this->hasLocation()) {
            throw new LocationUndefined();
        }

        return $this->location;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasLocation(): bool
    {
        return !is_null($this->location);
    }

    /**
     * ...
     *
     * @param int $weight
     *   ...
     *
     * @return self
     */
    public function weight(int $weight): self
    {
        $this->setWeight($weight);

        return $this;
    }

    /**
     * ...
     *
     * @param int $weight
     *   ...
     *
     * @return void
     */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * ...
     *
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }
}

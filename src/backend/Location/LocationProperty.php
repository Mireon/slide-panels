<?php

namespace Mireon\SlidePanels\Location;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Location
 */
trait LocationProperty
{
    /**
     * ... 
     * 
     * @var Location|null $location
     */
    private ?Location $location = null;

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
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
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
}

<?php

namespace Mireon\SlidePanels\Location;

use Mireon\SlidePanels\Methods\CreateMethod;

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
    public function getClone(): Location
    {
        return clone $this;
    }
}

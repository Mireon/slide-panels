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
     * The constructor.
     *
     * @param string|null $panel
     *   ...
     * @param string|null $layer
     *   ...
     */
    public function __construct(?string $panel = null, ?string $layer = null)
    {
        $this->setPanel($panel);
        $this->setLayer($layer);
    }

    /**
     * Creates an instance of this class.
     *
     * @param string|null $panel
     *   ...
     * @param string|null $layer
     *   ...
     *
     * @return static
     */
    public static function create(?string $panel = null, ?string $layer = null): self
    {
        return new static($panel, $layer);
    }

    /**
     * ...
     *
     * @param string|null $panel
     *   ...
     *
     * @return self
     */
    public function panel(?string $panel): self
    {
        $this->setPanel($panel);

        return $this;
    }

    /**
     * ...
     *
     * @param string|null $panel
     *   ...
     *
     * @return void
     */
    public function setPanel(?string $panel): void
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
     * @param string|null $layer
     *   ...
     *
     * @return self
     */
    public function layer(?string $layer): self
    {
        $this->setLayer($layer);

        return $this;
    }

    /**
     * ...
     *
     * @param string|null $layer
     *   ...
     *
     * @return void
     */
    public function setLayer(?string $layer): void
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
     * @return string
     */
    public function __toString(): string
    {
        $result = '';

        if ($this->hasPanel()) {
            $result .= $this->getPanel();
        }

        if ($this->hasLayer()) {
            $result .= '.';
            $result .= $this->getLayer();
        }

        return $result;
    }
}

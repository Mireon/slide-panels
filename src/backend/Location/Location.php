<?php

namespace Mireon\SlidePanels\Location;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Location
 */
class Location
{
    /**
     * ...
     *
     * @var string|null $panel
     */
    private ?string $panel = null;

    /**
     * The constructor.
     *
     * @param string|null $panel
     *   ...
     */
    public function __construct(?string $panel = null)
    {
        $this->setPanel($panel);
    }

    /**
     * Creates an instance of this class.
     *
     * @param string|null $panel
     *   ...
     *
     * @return static
     */
    public static function create(?string $panel = null): self
    {
        return new static($panel);
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->getPanel() ?: '';
    }
}

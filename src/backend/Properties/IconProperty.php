<?php

namespace Mireon\SlidePanels\Properties;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Properties
 */
trait IconProperty
{
    /**
     * ...
     *
     * @var string|null $icon
     */
    private ?string $icon = null;

    /**
     * ...
     *
     * @param string $icon
     *   ...
     *
     * @return self
     */
    public function icon(string $icon): self
    {
        $this->setIcon($icon);

        return $this;
    }

    /**
     * ...
     *
     * @param string $icon
     *   ...
     *
     * @return void
     */
    public function setIcon(string $icon): void
    {
        $this->icon = $icon ?: null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasIcon(): bool
    {
        return !is_null($this->icon);
    }
}

<?php

namespace Mireon\SlidePanels\Properties;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Properties
 */
trait SizeProperty
{
    /**
     * ...
     *
     * @var string|null $size
     */
    private ?string $size = null;

    /**
     * ...
     *
     * @param string $size
     *   ...
     *
     * @return self
     */
    public function size(string $size): self
    {
        $this->setSize($size);

        return $this;
    }

    /**
     * ...
     *
     * @param string $size
     *   ...
     *
     * @return void
     */
    public function setSize(string $size): void
    {
        $this->size = $size ?: null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getSize(): ?string
    {
        return $this->size;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasSize(): bool
    {
        return !is_null($this->size);
    }
}

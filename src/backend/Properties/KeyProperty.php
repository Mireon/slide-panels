<?php

namespace Mireon\SlidePanels\Properties;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Properties
 */
trait KeyProperty
{
    /**
     * ...
     *
     * @var string|null $key
     */
    private ?string $key = null;

    /**
     * ...
     *
     * @param string $key
     *   ...
     *
     * @return self
     */
    public function key(string $key): self
    {
        $this->setKey($key);

        return $this;
    }

    /**
     * ...
     *
     * @param string $key
     *   ...
     *
     * @return void
     */
    public function setKey(string $key): void
    {
        $this->key = $key ?: null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @return bool
     */
    public function hasKey(): bool
    {
        return !is_null($this->key);
    }
}

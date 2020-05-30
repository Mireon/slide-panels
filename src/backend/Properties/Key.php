<?php

namespace Mireon\SlidePanels\Properties;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Properties
 */
trait Key
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

<?php

namespace Mireon\SlidePanels\Widgets;

use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * The base widget.
 *
 * @package Mireon\SlidePanels\Widgets
 */
abstract class Widget implements WidgetInterface
{
    use RenderToString;

    /**
     * The widget key.
     *
     * @var string|null
     */
    private ?string $key = null;

    /**
     * The widget weight.
     *
     * @var int $weight
     */
    private int $weight = 0;

    /**
     * Sets the widget key.
     *
     * @param string|null $key
     *   A widget key.
     *
     * @return self
     */
    public function key(?string $key): self
    {
        $this->setKey($key);

        return $this;
    }

    /**
     * Sets the widget key.
     *
     * @param string|null $key
     *   A widget key.
     *
     * @return void
     */
    public function setKey(?string $key): void
    {
        $key = trim($key);
        $key = htmlspecialchars($key, ENT_QUOTES, 'UTF-8');
        $key = str_replace(' ', '-', $key);
        $key = mb_strtolower($key);

        $this->key = $key ?: null;
    }

    /**
     * @inheritDoc
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @inheritDoc
     */
    public function hasKey(): bool
    {
        return !is_null($this->key);
    }

    /**
     * Sets the widget weight.
     *
     * @param int $weight
     *   A widget weight.
     *
     * @return self
     */
    public function weight(int $weight): self
    {
        $this->setWeight($weight);

        return $this;
    }

    /**
     * Sets the widget weight.
     *
     * @param int $weight
     *   A widget weight.
     *
     * @return void
     */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @inheritDoc
     */
    public function getWeight(): int
    {
        return $this->weight;
    }
}

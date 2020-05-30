<?php

namespace Mireon\SlidePanels\Properties;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Properties
 */
trait TextProperty
{
    /**
     * ...
     *
     * @var string|null $text
     */
    private ?string $text = null;

    /**
     * ...
     *
     * @param string $text
     *   ...
     *
     * @return self
     */
    public function text(string $text): self
    {
        $this->setText($text);

        return $this;
    }

    /**
     * ...
     *
     * @param string $text
     *   ...
     *
     * @return void
     */
    public function setText(string $text): void
    {
        $this->text = $text ?: null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasText(): bool
    {
        return !is_null($this->text);
    }
}

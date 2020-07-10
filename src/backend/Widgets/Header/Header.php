<?php

namespace Mireon\SlidePanels\Widgets\Header;

use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Widgets\Widget;

/**
 * The header widget.
 *
 * @package Mireon\SlidePanels\Widgets\Header
 */
class Header extends Widget
{
    /**
     * The small size of header.
     */
    public const SMALL = 'small';

    /**
     * The big size of header.
     */
    public const BIG = 'big';

    /**
     * The header size.
     *
     * @var string
     */
    private string $size = self::BIG;

    /**
     * The header text.
     *
     * @var string|null
     */
    private ?string $text = null;

    /**
     * The header icon.
     *
     * @var string|null
     */
    private ?string $icon = null;

    /**
     * The constructor.
     *
     * @param string|null $text
     *   A header text.
     * @param string|null $icon
     *   A header icon.
     * @param string|null $size
     *   A header size.
     */
    public function __construct(?string $text = null, ?string $icon = null, ?string $size = null)
    {
        $this->setText($text);
        $this->setIcon($icon);
        $this->setSize($size);
    }

    /**
     * Creates the header.
     *
     * @param string|null $text
     *   A header text.
     * @param string|null $icon
     *   A header icon.
     * @param string|null $size
     *   A header size.
     *
     * @return self
     */
    public static function create(?string $text = null, ?string $icon = null, ?string $size = null): self
    {
        return new self($text, $icon, $size);
    }

    /**
     * Creates the small header.
     *
     * @param string|null $text
     *   A header text.
     * @param string|null $icon
     *   A header icon.
     *
     * @return self
     */
    public static function small(?string $text = null, ?string $icon = null): self
    {
        return new self($text, $icon, self::SMALL);
    }

    /**
     * Creates the big header.
     *
     * @param string|null $text
     *   A header text.
     * @param string|null $icon
     *   A header icon.
     *
     * @return self
     */
    public static function big(?string $text = null, ?string $icon = null): self
    {
        return new self($text, $icon, self::BIG);
    }

    /**
     * Sets the header text.
     *
     * @param string|null $text
     *   A header text.
     *
     * @return self
     */
    public function text(?string $text): self
    {
        $this->setText($text);

        return $this;
    }

    /**
     * Sets the header text.
     *
     * @param string|null $text
     *   A header text.
     *
     * @return void
     */
    public function setText(?string $text): void
    {
        $this->text = $text ?: null;
    }

    /**
     * Returns the header text.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Checks if the header text is defined.
     *
     * @return bool
     */
    public function hasText(): bool
    {
        return !is_null($this->text);
    }

    /**
     * Sets the header size.
     *
     * @param string|null $size
     *   A header size.
     *
     * @return self
     */
    public function size(?string $size): self
    {
        $this->setSize($size);

        return $this;
    }

    /**
     * Sets the header size.
     *
     * @param string|null $size
     *   A header size.
     *
     * @return void
     */
    public function setSize(?string $size): void
    {
        switch ($size) {
            case self::BIG:
            case self::SMALL:
                $this->size = $size;
                break;
        }
    }

    /**
     * Returns the header size.
     *
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * Sets the header icon.
     *
     * @param string|null $icon
     *   A header icon.
     *
     * @return self
     */
    public function icon(?string $icon): self
    {
        $this->setIcon($icon);

        return $this;
    }

    /**
     * Sets the header icon.
     *
     * @param string|null $icon
     *   A header icon.
     *
     * @return void
     */
    public function setIcon(?string $icon): void
    {
        $this->icon = $icon ?: null;
    }

    /**
     * Returns the header icon.
     *
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * Checks if the header icon is defined.
     *
     * @return bool
     */
    public function hasIcon(): bool
    {
        return !is_null($this->icon);
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasText();
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return Renderer::render('widgets/header/header', ['header' => $this]);
    }
}

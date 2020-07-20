<?php

namespace Mireon\SlidePanels\Widgets\Close;

use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Widgets\Widget;

/**
 * The widget to hide a panel.
 *
 * @package Mireon\SlidePanels\Widgets\Close
 */
class Close extends Widget
{
    use RenderToString;

    /**
     * The text.
     *
     * @var string|null
     */
    private ?string $text = null;

    /**
     * The icon.
     *
     * @var string|null
     */
    private ?string $icon = null;

    /**
     * The constructor.
     *
     * @param string|null $text
     *   A text.
     * @param string|null $icon
     *   An icon.
     */
    public function __construct(?string $text = null, ?string $icon = null)
    {
        $this->setText($text);
        $this->setIcon($icon);
    }

    /**
     * Creates the close widget.
     *
     * @param string|null $text
     *   A text.
     * @param string|null $icon
     *   An icon.
     *
     * @return static
     */
    public static function create(?string $text = null, ?string $icon = null): self
    {
        return new static($text, $icon);
    }

    /**
     * Sets the text.
     *
     * @param string|null $text
     *   A text.
     *
     * @return self
     */
    public function text(?string $text): self
    {
        $this->setText($text);

        return $this;
    }

    /**
     * Sets the text.
     *
     * @param string|null $text
     *   A text.
     *
     * @return void
     */
    public function setText(?string $text): void
    {
        $this->text = $text ?: null;
    }

    /**
     * Returns the text.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Checks if the text is defined.
     *
     * @return bool
     */
    public function hasText(): bool
    {
        return !is_null($this->text);
    }

    /**
     * Sets the icon.
     *
     * @param string|null $icon
     *   An icon.
     *
     * @return self
     */
    public function icon(?string $icon): self
    {
        $this->setIcon($icon);

        return $this;
    }

    /**
     * Sets the icon.
     *
     * @param string|null $icon
     *   An icon.
     *
     * @return void
     */
    public function setIcon(?string $icon): void
    {
        $this->icon = $icon ?: null;
    }

    /**
     * Returns the icon.
     *
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * Checks if the icon is defined.
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
        return true;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return Renderer::render('widgets/close/close', ['close' => $this]);
    }
}

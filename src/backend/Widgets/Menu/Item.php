<?php

namespace Mireon\SlidePanels\Widgets\Menu;

use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * The menu item.
 *
 * @package Mireon\SlidePanels\Widgets\Menu
 */
class Item implements ItemInterface
{
    use RenderToString;

    /**
     * The item text.
     *
     * @var string|null
     */
    private ?string $text = null;

    /**
     * The item URL.
     *
     * @var string|null
     */
    private ?string $url = null;

    /**
     * The item icon.
     *
     * @var string|null
     */
    private ?string $icon = null;

    /**
     * The constructor.
     *
     * @param string|null $text
     *   An item text.
     * @param string|null $url
     *   An item URL.
     * @param string|null $icon
     *   An item icon.
     */
    public function __construct(?string $text = null, ?string $url = null, ?string $icon = null)
    {
        $this->setText($text);
        $this->setUrl($url);
        $this->setIcon($icon);
    }

    /**
     * Creates an instance of this class.
     *
     * @param string|null $text
     *   An item text.
     * @param string|null $url
     *   An item URL.
     * @param string|null $icon
     *   An item icon.
     *
     * @return self
     */
    public static function create(?string $text = null, ?string $url = null, ?string $icon = null): self
    {
        return new self($text, $url, $icon);
    }

    /**
     * Sets the item text.
     *
     * @param string|null $text
     *   An item text.
     *
     * @return self
     */
    public function text(?string $text): self
    {
        $this->setText($text);

        return $this;
    }

    /**
     * Sets the item text.
     *
     * @param string|null $text
     *   An item text.
     *
     * @return void
     */
    public function setText(?string $text): void
    {
        $this->text = $text ?: null;
    }

    /**
     * Returns the item text.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Checks if the item text is defined.
     *
     * @return bool
     */
    public function hasText(): bool
    {
        return !is_null($this->text);
    }

    /**
     * Sets the item URL.
     *
     * @param string|null $url
     *   An item URL.
     *
     * @return self
     */
    public function url(?string $url): self
    {
        $this->setUrl($url);

        return $this;
    }

    /**
     * Sets the item URL.
     *
     * @param string|null $url
     *   An item URL.
     *
     * @return void
     */
    public function setUrl(?string $url): void
    {
        $this->url = filter_var($url, FILTER_VALIDATE_URL) ? $url : null;
    }

    /**
     * Returns the item URL.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Checks if the item URL is defined.
     *
     * @return bool
     */
    public function hasUrl(): bool
    {
        return !is_null($this->url);
    }

    /**
     * Sets the item icon.
     *
     * @param string|null $icon
     *   An item icon.
     *
     * @return self
     */
    public function icon(?string $icon): self
    {
        $this->setIcon($icon);

        return $this;
    }

    /**
     * Sets the item icon.
     *
     * @param string|null $icon
     *   An item icon.
     *
     * @return void
     */
    public function setIcon(?string $icon): void
    {
        $this->icon = $icon ?: null;
    }

    /**
     * Returns the item icon.
     *
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * Checks if the item icon is defined.
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
        return $this->hasText() && $this->hasUrl();
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return Renderer::render('widgets/menu/item', ['item' => $this]);
    }
}

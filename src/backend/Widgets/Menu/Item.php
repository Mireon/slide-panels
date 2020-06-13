<?php

namespace Mireon\SlidePanels\Widgets\Menu;

use Exception;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Widgets\Menu
 */
class Item implements ItemInterface
{
    use RenderToString;

    /**
     * ...
     *
     * @var string|null
     */
    private ?string $text = null;

    /**
     * ...
     *
     * @var string|null
     */
    private ?string $url = null;

    /**
     * ...
     *
     * @var string|null
     */
    private ?string $icon = null;

    /**
     * The constructor.
     *
     * @param string|null $text
     *   ...
     * @param string|null $url
     *   ...
     * @param string|null $icon
     *   ...
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
     *   ...
     * @param string|null $url
     *   ...
     * @param string|null $icon
     *   ...
     *
     * @return self
     */
    public static function create(?string $text = null, ?string $url = null, ?string $icon = null): self
    {
        return new self($text, $url, $icon);
    }

    /**
     * ...
     *
     * @param string|null $text
     *   ...
     *
     * @return self
     */
    public function text(?string $text): self
    {
        $this->setText($text);

        return $this;
    }

    /**
     * ...
     *
     * @param string|null $text
     *   ...
     *
     * @return void
     */
    public function setText(?string $text): void
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

    /**
     * ...
     *
     * @param string|null $url
     *   ...
     *
     * @return self
     */
    public function url(?string $url): self
    {
        $this->setUrl($url);

        return $this;
    }

    /**
     * ...
     *
     * @param string|null $url
     *   ...
     *
     * @return void
     */
    public function setUrl(?string $url): void
    {
        $this->url = filter_var($url, FILTER_VALIDATE_URL) ? $url : null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasUrl(): bool
    {
        return !is_null($this->url);
    }

    /**
     * ...
     *
     * @param string|null $icon
     *   ...
     *
     * @return self
     */
    public function icon(?string $icon): self
    {
        $this->setIcon($icon);

        return $this;
    }

    /**
     * ...
     *
     * @param string|null $icon
     *   ...
     *
     * @return void
     */
    public function setIcon(?string $icon): void
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

    /**
     * ...
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->hasText() && $this->hasUrl();
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Renderer::view('widgets/menu/item', ['item' => $this]);
    }
}

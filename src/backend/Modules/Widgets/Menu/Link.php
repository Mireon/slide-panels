<?php

namespace Mireon\SlidePanels\Modules\Widgets\Menu;

use Exception;
use Mireon\SlidePanels\Properties\IconProperty;
use Mireon\SlidePanels\Properties\TextProperty;
use Mireon\SlidePanels\Properties\UrlProperty;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets\Menu
 */
class Link implements ItemInterface
{
    use IconProperty;
    use TextProperty;
    use UrlProperty;
    use RenderToString;

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
        if (!empty($text)) {
            $this->setText($text);
        }

        if (!empty($url)) {
            $this->setUrl($url);
        }

        if (!empty($icon)) {
            $this->setIcon($icon);
        }
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
        return Renderer::view('widgets/menu/link', ['link' => $this]);
    }
}

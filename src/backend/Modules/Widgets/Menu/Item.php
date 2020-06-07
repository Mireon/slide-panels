<?php

namespace Mireon\SlidePanels\Modules\Widgets\Menu;

use Mireon\SlidePanels\Exceptions\FileNotFound;
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
class Item implements ItemInterface
{
    use IconProperty;
    use TextProperty;
    use UrlProperty;
    use RenderToString;

    /**
     * Creates an instance of this class.
     *
     * @return static
     */
    public static function create(): self
    {
        return new static();
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
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('widgets/menu/item', ['item' => $this]);
    }
}

<?php

namespace Mireon\SlidePanels\Modules\Widgets\Header;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Modules\Widgets\Widget;
use Mireon\SlidePanels\Properties\IconProperty;
use Mireon\SlidePanels\Properties\SizeProperty;
use Mireon\SlidePanels\Properties\TextProperty;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets\Header
 */
class Header extends Widget
{
    use TextProperty;
    use IconProperty;
    use SizeProperty;

    /**
     * ...
     */
    public const SIZE_SMALL = 'small';

    /**
     * ...
     */
    public const SIZE_BIG = 'big';

    /**
     * The constructor.
     */
    public function __construct()
    {
        $this->size = self::SIZE_BIG;
    }

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
     * @param string $side
     *   ...
     *
     * @return void
     */
    public function setSize(string $side): void
    {
        switch ($side) {
            case self::SIZE_BIG:
            case self::SIZE_SMALL:
                $this->size = $side;
        }
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasIcon() || $this->hasText();
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('widgets/header/header', ['header' => $this]);
    }
}

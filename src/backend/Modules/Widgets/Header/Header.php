<?php

namespace Mireon\SlidePanels\Modules\Widgets\Header;

use Exception;
use Mireon\SlidePanels\Modules\Widgets\Widget;
use Mireon\SlidePanels\Properties\IconProperty;
use Mireon\SlidePanels\Properties\SizeProperty;
use Mireon\SlidePanels\Properties\TextProperty;
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
    public const SMALL = 'small';

    /**
     * ...
     */
    public const BIG = 'big';

    /**
     * The constructor.
     *
     * @param string|null $text
     *   ...
     * @param string|null $icon
     *   ...
     * @param string|null $size
     *   ...
     */
    public function __construct(?string $text = null, ?string $icon = null, string $size = null)
    {
        if (!empty($text)) {
            $this->setText($text);
        }

        if (!empty($icon)) {
            $this->setIcon($icon);
        }

        if (!empty($size)) {
            $this->setSize($size);
        } else {
            $this->setSize(self::BIG);
        }
    }

    /**
     * Creates an instance of this class.
     *
     * @param string|null $text
     *   ...
     * @param string|null $icon
     *   ...
     * @param string|null $size
     *   ...
     *
     * @return self
     */
    public static function create(?string $text = null, ?string $icon = null, string $size = null): self
    {
        return new self($text, $icon, $size);
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
            case self::BIG:
            case self::SMALL:
                $this->size = $side;
                break;
        }
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
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Renderer::view('widgets/header/header', ['header' => $this]);
    }
}

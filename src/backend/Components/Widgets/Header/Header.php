<?php

namespace Mireon\SlidePanels\Components\Widgets\Header;

use Exception;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Components\Widgets\Header
 */
class Header implements Renderable
{
    use RenderString;

    /**
     * ...
     */
    public const SIZE_SMALL = 'small';

    /**
     * ...
     */
    public const SIZE_BIG = 'big';

    /**
     * ...
     *
     * @var string $size
     */
    private string $size = self::SIZE_BIG;

    /**
     * ...
     *
     * @var string|null $text
     */
    private ?string $text = null;

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
     * ...
     *
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
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
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Render::view('widgets/header', ['header' => $this]);
    }
}

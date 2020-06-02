<?php

namespace Mireon\SlidePanels\Modules\Widgets\Header;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Properties\IconProperty;
use Mireon\SlidePanels\Properties\SizeProperty;
use Mireon\SlidePanels\Properties\TextProperty;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Methods\CreateMethod;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets\Header
 */
class Header implements Renderable
{
    use TextProperty;
    use IconProperty;
    use SizeProperty;
    use RenderToString;
    use CreateMethod;

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
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('widgets/header', ['header' => $this]);
    }
}

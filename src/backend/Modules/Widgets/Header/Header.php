<?php

namespace Mireon\SlidePanels\Modules\Widgets\Header;

use Exception;
use Mireon\SlidePanels\Properties\IconProperty;
use Mireon\SlidePanels\Properties\SizeProperty;
use Mireon\SlidePanels\Properties\TextProperty;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;
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
    use RenderString;
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
     * @throws Exception
     */
    public function render(): string
    {
        return Render::view('widgets/header', ['header' => $this]);
    }
}

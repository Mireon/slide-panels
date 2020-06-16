<?php

namespace Mireon\SlidePanels\Examples\Catalog;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Levers\Lever;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\PanelStyles;
use Mireon\SlidePanels\Widgets\Header\Header;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

/**
 * The catalog.
 *
 * @package Mireon\SlidePanels\Examples\Catalog
 */
class Catalog implements FactoryInterface
{
    /**
     * The panel key.
     */
    public const KEY = 'catalog';

    /**
     * @inheritDoc
     */
    public function doMake(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function make(Designer $designer): void
    {
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/catalog';

        $designer
            ->panel(self::KEY)
            ->width(960)
            ->side(Panel::LEFT)
            ->widget(Menu::create()
                ->weight(-1)
                ->item(Lever::hide('CLOSE'))
            )
            ->widget(Header::create()
                ->weight(0)
                ->size(Header::BIG)
                ->icon('fa fa-th')
                ->text('Catalog')
            )
            ->widget(Menu::create()
                ->weight(10)
                ->item(Item::create('Electronics', "$url/electronics"))
                ->item(Item::create('Construction & Repair', "$url/construction-&-tools"))
                ->item(Item::create('Home & Garden', "$url/construction-&-tools"))
                ->item(Item::create('Health & Beauty', "$url/health-&-beauty"))
                ->item(Item::create('Sport & Tourism', "$url/sport-&-tourism"))
            );
    }
}

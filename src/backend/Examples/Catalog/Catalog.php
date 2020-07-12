<?php

namespace Mireon\SlidePanels\Examples\Catalog;

use Exception;
use Mireon\SlidePanels\Designer\DesignerInterface;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Widgets\Close\Close;
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
    public function make(DesignerInterface $designer): void
    {
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/catalog';

        $designer
            ->panel(self::KEY)
            ->width(960)
            ->side(Panel::LEFT)
            ->widget(Close::create()
                ->icon('fa fa-close')
                ->text('Close'))
            ->widget(Header::create()
                ->weight(0)
                ->size(Header::BIG)
                ->icon('fa fa-th')
                ->text('Catalog'))
            ->widget(Menu::create()
                ->weight(10)
                ->item(Item::create('Electronics', "$url/electronics", 'fa fa-headphones'))
                ->item(Item::create('Construction & Repair', "$url/construction-&-tools", 'fa fa-wrench'))
                ->item(Item::create('Home & Garden', "$url/construction-&-tools", 'fa fa-home'))
                ->item(Item::create('Health & Beauty', "$url/health-&-beauty", 'fa fa-magic'))
                ->item(Item::create('Sport & Tourism', "$url/sport-&-tourism", 'fa fa-plane')));
    }
}

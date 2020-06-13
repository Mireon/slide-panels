<?php

namespace Mireon\SlidePanels\Examples\Catalog;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Widgets\Header\Header;
use Mireon\SlidePanels\Widgets\Menu\Link;
use Mireon\SlidePanels\Widgets\Menu\Menu;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Examples\Catalog
 */
class Catalog implements FactoryInterface
{
    /**
     * ...
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
        $url = 'http://example.com/catalog';

        $designer
            ->panel(self::KEY)
            ->side(Panel::LEFT)
            ->header(Header::create()
                ->size(Header::BIG)
                ->icon('fa fa-th')
                ->text('Catalog')
            )
            ->widget(Menu::create()
                ->item(Link::create('Electronics', "$url/electronics"))
                ->item(Link::create('Construction & Repair', "$url/construction-&-tools"))
                ->item(Link::create('Home & Garden', "$url/construction-&-tools"))
                ->item(Link::create('Health & Beauty', "$url/health-&-beauty"))
            );
    }
}

<?php

namespace Mireon\SlidePanels\Examples\Catalog;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Levers\Lever;
use Mireon\SlidePanels\Widgets\Menu\Link;
use Mireon\SlidePanels\Widgets\Menu\Menu;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Examples\Catalog
 */
class CatalogExtra implements FactoryInterface
{
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

        $menu = Menu::create()
            ->item(Link::create('Sport & Tourism', "$url/sport&-tourism"))
            ->item(Link::create('Other', "$url/other"))
            ->item(Lever::hide('Close'));

        $designer->panel(Catalog::KEY)->widget($menu);
    }
}

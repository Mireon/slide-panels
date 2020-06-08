<?php

namespace Mireon\SlidePanels\Examples\Catalog;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Modules\Widgets\Menu\Link;
use Mireon\SlidePanels\Modules\Widgets\Menu\Menu;

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
        ->item(Link::create()->text('Sport & Tourism')->url("$url/sport&-tourism"))
        ->item(Link::create()->text('Other')->url("$url/other"));

        $designer->panel(Catalog::KEY)->addWidget($menu);
    }
}

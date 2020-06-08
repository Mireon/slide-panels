<?php

namespace Mireon\SlidePanels\Examples\Catalog;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Modules\Panels\Panel;
use Mireon\SlidePanels\Modules\Widgets\Header\Header;
use Mireon\SlidePanels\Modules\Widgets\Menu\Link;
use Mireon\SlidePanels\Modules\Widgets\Menu\Menu;

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

        $designer->panel(self::KEY)
            ->side(Panel::LEFT)
            ->header(Header::create()
                ->size(Header::BIG)
                ->icon('fa fa-th')
                ->text('Catalog')
            )
            ->widget(Menu::create()
                ->item(Link::create()->text('Electronics')->url("$url/electronics"))
                ->item(Link::create()->text('Construction & Repair')->url("$url/construction-&-tools"))
                ->item(Link::create()->text('Home & Garden')->url("$url/construction-&-tools"))
                ->item(Link::create()->text('Health & Beauty')->url("$url/health-&-beauty"))
            );
    }
}

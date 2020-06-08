<?php

namespace Mireon\SlidePanels\Examples\Catalog;

use Mireon\SlidePanels\Builder\Builder;
use Mireon\SlidePanels\Builder\BuilderEvent;
use Mireon\SlidePanels\Builder\PanelKeyUndefined;
use Mireon\SlidePanels\Location\Location;
use Mireon\SlidePanels\Modules\Panels\Panel;
use Mireon\SlidePanels\Modules\Widgets\Header\Header;
use Mireon\SlidePanels\Modules\Widgets\Menu\Item;
use Mireon\SlidePanels\Modules\Widgets\Menu\ItemInvalid;
use Mireon\SlidePanels\Modules\Widgets\Menu\Menu;
use Mireon\SlidePanels\Modules\Widgets\WidgetInvalid;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Examples\Catalog
 */
class Catalog implements BuilderEvent
{
    /**
     * ...
     */
    public const KEY = 'catalog';

    /**
     * @inheritDoc
     */
    public function doBuild(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     *
     * @throws ItemInvalid
     * @throws WidgetInvalid
     */
    public function build(Builder $builder): void
    {
        $url = 'http://example.com/catalog';

        $panel = Panel::create()
            ->side(Panel::SIDE_LEFT)
            ->key(self::KEY)
            ->header(Header::create()
                ->size(Header::SIZE_BIG)
                ->icon('fa fa-catalog')
                ->text('Catalog')
            )
            ->widget(Menu::create()
                ->location(Location::create(self::KEY))
                ->item(Item::create()->text('Electronics')->url("$url/electronics"))
                ->item(Item::create()->text('Construction & Repair')->url("$url/construction-&-tools"))
                ->item(Item::create()->text('Home & Garden')->url("$url/construction-&-tools"))
                ->item(Item::create()->text('Health & Beauty')->url("$url/health-&-beauty"))
            );

        $builder->panel($panel);
    }
}

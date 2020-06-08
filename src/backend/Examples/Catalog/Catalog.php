<?php

namespace Mireon\SlidePanels\Examples\Catalog;

use Mireon\SlidePanels\Builder\Builder;
use Mireon\SlidePanels\Builder\BuilderEvent;
use Mireon\SlidePanels\Location\Location;
use Mireon\SlidePanels\Modules\Layers\Layer;
use Mireon\SlidePanels\Modules\Levers\Lever;
use Mireon\SlidePanels\Modules\Panels\Exceptions\PanelIsUndefined;
use Mireon\SlidePanels\Modules\Panels\Panel;
use Mireon\SlidePanels\Modules\Widgets\Header\Header;
use Mireon\SlidePanels\Modules\Widgets\Menu\Exceptions\ItemIsInvalid;
use Mireon\SlidePanels\Modules\Widgets\Menu\Menu;

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
     * @throws ItemIsInvalid
     * @throws PanelIsUndefined
     */
    public function build(Builder $builder): void
    {
        $panel = Panel::create()
            ->side(Panel::SIDE_LEFT)
            ->key(self::KEY)
            ->header(Header::create()
                ->size(Header::SIZE_BIG)
                ->icon('fa fa-catalog')
                ->text('Catalog')
            );

        $layer = Layer::create()
            ->key('root')
            ->location(Location::create()->panel('catalog'))
            ->widget(Menu::create()
                ->item(Lever::create()->text('Electronics')->target('catalog', 'electronics'))
                ->item(Lever::create()->text('Construction & Repair')->target('catalog', 'construction-&-tools'))
                ->item(Lever::create()->text('Home & Garden')->target('catalog', 'construction-&-tools'))
                ->item(Lever::create()->text('Health & Beauty')->target('catalog', 'health-&-beauty'))
            );

        $builder->panel($panel);
        $builder->layer($layer);
    }
}

<?php

namespace Mireon\SlidePanels\Examples\Account;

use Mireon\SlidePanels\Builder\Builder;
use Mireon\SlidePanels\Builder\BuilderEvent;
use Mireon\SlidePanels\Builder\PanelKeyUndefined;
use Mireon\SlidePanels\Examples\Catalog\Catalog;
use Mireon\SlidePanels\Location\Location;
use Mireon\SlidePanels\Modules\Levers\Lever;
use Mireon\SlidePanels\Modules\Widgets\Menu\Item;
use Mireon\SlidePanels\Modules\Widgets\Menu\ItemInvalid;
use Mireon\SlidePanels\Modules\Widgets\Menu\Menu;
use Mireon\SlidePanels\Modules\Widgets\WidgetInvalid;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Examples\Account
 */
class AccountAuthenticated implements BuilderEvent
{
    /**
     * @inheritDoc
     */
    public function doBuild(): bool
    {
        return isset($_REQUEST['user']);
    }

    /**
     * @inheritDoc
     *
     * @throws ItemInvalid
     * @throws PanelKeyUndefined
     * @throws WidgetInvalid
     */
    public function build(Builder $builder): void
    {
        $host = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        $query = 'user[name]=User';

        $widget = Menu::create()
            ->location(Location::create(Account::KEY))
            ->item(Item::create()->text('Profile')->url("$host/profile?$query"))
            ->item(Item::create()->text('Settings')->url("$host/settings?$query"))
            ->item(Lever::create()->text('Catalog')->target(Catalog::KEY))
            ->item(Item::create()->text('Logout')->url($host));

        $builder->widget($widget);
    }
}

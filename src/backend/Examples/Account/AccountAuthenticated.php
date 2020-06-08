<?php

namespace Mireon\SlidePanels\Examples\Account;

use Mireon\SlidePanels\Builder\Builder;
use Mireon\SlidePanels\Builder\BuilderEvent;
use Mireon\SlidePanels\Location\Location;
use Mireon\SlidePanels\Modules\Layers\Layer;
use Mireon\SlidePanels\Modules\Levers\Lever;
use Mireon\SlidePanels\Modules\Panels\Exceptions\PanelIsUndefined;
use Mireon\SlidePanels\Modules\Widgets\Menu\Exceptions\ItemIsInvalid;
use Mireon\SlidePanels\Modules\Widgets\Menu\Item;
use Mireon\SlidePanels\Modules\Widgets\Menu\Menu;

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
     * @throws ItemIsInvalid
     * @throws PanelIsUndefined
     */
    public function build(Builder $builder): void
    {
        $host = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        $query = 'user[name]=User';

        $layer = Layer::create()
            ->key('root')
            ->location(Location::create()->panel(Account::KEY))
            ->widget(Menu::create()
                ->item(Item::create()->text('Profile')->url("$host/profile?$query"))
                ->item(Lever::create()->text('Favorite')->target('account', 'favorite'))
                ->item(Item::create()->text('Settings')->url("$host/settings?$query"))
                ->item(Item::create()->text('Logout')->url($host))
            );

        $builder->layer($layer);
    }
}

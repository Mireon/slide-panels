<?php

namespace Mireon\SlidePanels\Examples\Account;

use Mireon\SlidePanels\Builder\Builder;
use Mireon\SlidePanels\Builder\BuilderEvent;
use Mireon\SlidePanels\Location\Location;
use Mireon\SlidePanels\Modules\Layers\Layer;
use Mireon\SlidePanels\Modules\Panels\Exceptions\PanelIsUndefined;
use Mireon\SlidePanels\Modules\Widgets\Header\Header;
use Mireon\SlidePanels\Modules\Widgets\Html\Html;
use Mireon\SlidePanels\Modules\Widgets\Menu\Exceptions\ItemIsInvalid;
use Mireon\SlidePanels\Modules\Widgets\Menu\Item;
use Mireon\SlidePanels\Modules\Widgets\Menu\Menu;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Examples\Account
 */
class AccountAnonymous implements BuilderEvent
{
    /**
     * @inheritDoc
     */
    public function doBuild(): bool
    {
        return !isset($_REQUEST['user']);
    }

    /**
     * @inheritDoc
     *
     * @throws PanelIsUndefined
     * @throws ItemIsInvalid
     */
    public function build(Builder $builder): void
    {
        $host = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        $query = 'user[name]=User';

        $layer = Layer::create()
            ->key('root')
            ->location(Location::create()->panel(Account::KEY))
            ->widget(Menu::create()
                ->item(Item::create()->text('Login')->url("$host?$query"))
                ->item(Item::create()->text('Register')->url("$host?$query"))
            );

        $builder->layer($layer);
    }
}

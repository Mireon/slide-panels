<?php

namespace Mireon\SlidePanels\Examples\Account;

use Exception;
use Mireon\SlidePanels\Examples\Catalog\Catalog;
use Mireon\SlidePanels\Levers\Lever;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\SlidePanelsInterface;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

/**
 * The account panel for the authenticated user.
 *
 * @package Mireon\SlidePanels\Examples\Account
 */
class AccountAuthenticated implements PanelFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function doMake(): bool
    {
        return isset($_REQUEST['user']);
    }

    /**
     * @inheritDoc
     */
    public function getFactories(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function make(SlidePanelsInterface $slidePanels): void
    {
        $host = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        $query = 'user[name]=User';

        $slidePanels
            ->panel(Account::KEY)
            ->widget(Menu::create()
                ->item(Item::create('Profile', "$host/profile?$query"))
                ->item(Item::create('Settings', "$host/settings?$query"))
                ->item(Lever::create('Catalog', Catalog::KEY))
                ->item(Item::create('Logout', $host)));
    }
}

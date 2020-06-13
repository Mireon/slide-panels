<?php

namespace Mireon\SlidePanels\Examples\Account;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Examples\Catalog\Catalog;
use Mireon\SlidePanels\Levers\Lever;
use Mireon\SlidePanels\Widgets\Menu\Link;
use Mireon\SlidePanels\Widgets\Menu\Menu;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Examples\Account
 */
class AccountAuthenticated implements FactoryInterface
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
     *
     * @throws Exception
     */
    public function make(Designer $designer): void
    {
        $host = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        $query = 'user[name]=User';

        $designer
            ->panel(Account::KEY)
            ->widget(Menu::create()
                ->item(Link::create('Profile', "$host/profile?$query"))
                ->item(Link::create('Settings', "$host/settings?$query"))
                ->item(Lever::create('Catalog', Catalog::KEY))
                ->item(Link::create('Logout', $host))
        );
    }
}

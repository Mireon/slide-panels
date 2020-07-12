<?php

namespace Mireon\SlidePanels\Examples\Account;

use Exception;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\SlidePanelsInterface;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

/**
 * The account panel for the anonymous user.
 *
 * @package Mireon\SlidePanels\Examples\Account
 */
class AccountAnonymous implements PanelFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function doMake(): bool
    {
        return !isset($_REQUEST['user']);
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
            ->getPanel(Account::KEY)
            ->widget(Menu::create()
                ->item(Item::create('Login', "$host/login?$query"))
                ->item(Item::create('Register', "$host/register?$query")));
    }
}

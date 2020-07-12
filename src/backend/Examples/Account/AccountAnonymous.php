<?php

namespace Mireon\SlidePanels\Examples\Account;

use Exception;
use Mireon\SlidePanels\Designer\DesignerInterface;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

/**
 * The account panel for the anonymous user.
 *
 * @package Mireon\SlidePanels\Examples\Account
 */
class AccountAnonymous implements FactoryInterface
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
    public function make(DesignerInterface $designer): void
    {
        $host = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        $query = 'user[name]=User';

        $designer
            ->panel(Account::KEY)
            ->widget(Menu::create()
                ->item(Item::create('Login', "$host/login?$query"))
                ->item(Item::create('Register', "$host/register?$query")));
    }
}

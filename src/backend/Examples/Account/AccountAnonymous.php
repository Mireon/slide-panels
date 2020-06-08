<?php

namespace Mireon\SlidePanels\Examples\Account;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Modules\Widgets\Menu\Link;
use Mireon\SlidePanels\Modules\Widgets\Menu\Menu;

/**
 * ...
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
    public function make(Designer $designer): void
    {
        $host = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        $query = 'user[name]=User';

        $widget = Menu::create()
            ->item(Link::create()->text('Login')->url("$host?$query"))
            ->item(Link::create()->text('Register')->url("$host?$query"));

        $designer->panel(Account::KEY)->widget($widget);
    }
}

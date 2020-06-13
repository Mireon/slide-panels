<?php

namespace Mireon\SlidePanels\Examples\Account;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Widgets\Header\Header;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Examples\Account
 */
class Account implements FactoryInterface
{
    /**
     * ...
     */
    public const KEY = 'account';

    /**
     * @inheritDoc
     */
    public function doMake(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function make(Designer $designer): void
    {
        $designer->panel(self::KEY)
            ->side(Panel::RIGHT)
            ->header(Header::create()
                ->size(Header::BIG)
                ->icon('fa fa-user')
                ->text('Account')
            );
    }
}

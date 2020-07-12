<?php

namespace Mireon\SlidePanels\Examples\Account;

use Exception;
use Mireon\SlidePanels\Designer\DesignerInterface;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Widgets\Header\Header;

/**
 * The account panel.
 *
 * @package Mireon\SlidePanels\Examples\Account
 */
class Account implements FactoryInterface
{
    /**
     * The panel key.
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
    public function make(DesignerInterface $designer): void
    {
        $designer
            ->getPanel(self::KEY)
            ->side(Panel::RIGHT)
            ->widget(Header::create()
                ->size(Header::BIG)
                ->icon('fa fa-user')
                ->text('Account'));
    }
}

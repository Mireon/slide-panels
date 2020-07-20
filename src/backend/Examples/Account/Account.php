<?php

namespace Mireon\SlidePanels\Examples\Account;

use Exception;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\SlidePanelsInterface;
use Mireon\SlidePanels\Widgets\Header\Header;

/**
 * The account panel.
 *
 * @package Mireon\SlidePanels\Examples\Account
 */
class Account implements PanelFactoryInterface
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
     */
    public function getFactories(): array
    {
        return [
            AccountAnonymous::class,
            AccountAuthenticated::class,
        ];
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function make(SlidePanelsInterface $slidePanels): void
    {
        $slidePanels
            ->panel(self::KEY)
            ->side(Panel::RIGHT)
            ->widget(Header::create()
                ->size(Header::BIG)
                ->icon('fa fa-user')
                ->text('Account'));
    }

}

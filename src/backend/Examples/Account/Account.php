<?php

namespace Mireon\SlidePanels\Examples\Account;

use Mireon\SlidePanels\Builder\Builder;
use Mireon\SlidePanels\Builder\BuilderEvent;
use Mireon\SlidePanels\Modules\Panels\Panel;
use Mireon\SlidePanels\Modules\Widgets\Header\Header;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Examples\Account
 */
class Account implements BuilderEvent
{
    /**
     * ...
     */
    public const KEY = 'account';

    /**
     * @inheritDoc
     */
    public function doBuild(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function build(Builder $builder): void
    {
        $panel = Panel::create()
            ->side(Panel::SIDE_RIGHT)
            ->key(self::KEY)
            ->header(Header::create()
                ->size(Header::SIZE_BIG)
                ->icon('fa fa-user')
                ->text('Account')
            );

        $builder->panel($panel);
    }
}

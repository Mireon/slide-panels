<?php

namespace Mireon\SlidePanels\Examples\Catalog;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Widgets\Html\Html;

/**
 * The widget before the catalog.
 *
 * @package Mireon\SlidePanels\Examples\Catalog
 */
class CatalogBefore implements FactoryInterface
{
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
        $designer
            ->panel(Catalog::KEY)
            ->widget(Html::create()
                ->weight(5)
                ->html('<span style="display: block; padding: 10px; color: #ababab;">The main catalog!</span>'));
    }
}

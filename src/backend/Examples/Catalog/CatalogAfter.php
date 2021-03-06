<?php

namespace Mireon\SlidePanels\Examples\Catalog;

use Exception;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\SlidePanelsInterface;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

/**
 * The widget after the catalog.
 *
 * @package Mireon\SlidePanels\Examples\Catalog
 */
class CatalogAfter implements PanelFactoryInterface
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
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/catalog';

        $slidePanels
            ->panel(Catalog::KEY)
            ->widget(Menu::create()
                ->weight(15)
                ->item(Item::create('Other', "$url/other")));
    }
}

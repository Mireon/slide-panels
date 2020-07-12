<?php

namespace Mireon\SlidePanels\Examples\Catalog;

use Exception;
use Mireon\SlidePanels\Designer\DesignerInterface;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

/**
 * The widget after the catalog.
 *
 * @package Mireon\SlidePanels\Examples\Catalog
 */
class CatalogAfter implements FactoryInterface
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
    public function make(DesignerInterface $designer): void
    {
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/catalog';

        $designer
            ->getPanel(Catalog::KEY)
            ->widget(Menu::create()
                ->weight(15)
                ->item(Item::create('Other', "$url/other")));
    }
}

<?php

namespace Mireon\SlidePanels\Modules\Widgets\Menu;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets\Menu
 */
class ItemInvalid extends Exception
{
    /**
     * The constructor.
     *
     * @param ItemInterface $item
     *   ...
     */
    public function __construct(ItemInterface $item)
    {
        $name = get_class($item);
        parent::__construct("The menu item \"$name\" is invalid.");
    }
}

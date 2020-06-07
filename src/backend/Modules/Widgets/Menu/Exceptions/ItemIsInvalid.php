<?php

namespace Mireon\SlidePanels\Modules\Widgets\Menu\Exceptions;

use Exception;
use Mireon\SlidePanels\Modules\Widgets\Menu\ItemInterface;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets\Menu\Exceptions
 */
class ItemIsInvalid extends Exception
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
        $message = "The menu item \"$name\" is invalid.";
        parent::__construct($message);
    }
}

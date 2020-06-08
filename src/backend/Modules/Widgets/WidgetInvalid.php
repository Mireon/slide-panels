<?php

namespace Mireon\SlidePanels\Modules\Widgets;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets
 */
class WidgetInvalid extends Exception
{
    /**
     * The constructor.
     *
     * @param WidgetInterface $widget
     *   ...
     */
    public function __construct(WidgetInterface $widget)
    {
        $name = get_class($widget);
        parent::__construct("Widget \"$name\" is invalid.");
    }
}

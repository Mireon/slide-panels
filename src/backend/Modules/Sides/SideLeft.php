<?php

namespace Mireon\SlidePanels\Modules\Sides;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Sides
 */
class SideLeft extends Side
{
    /**
     * @inheritDoc
     */
    public function getSide(): string
    {
        return Sides::LEFT;
    }
}

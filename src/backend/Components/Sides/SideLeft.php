<?php

namespace Mireon\SlidePanels\Components\Sides;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Components\Sides
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

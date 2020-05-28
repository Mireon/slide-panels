<?php

namespace Mireon\SlidePanels\Modules\Sides;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Sides
 */
class SideRight extends Side
{
    /**
     * @inheritDoc
     */
    public function getSide(): string
    {
        return Sides::RIGHT;
    }
}

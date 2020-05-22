<?php

namespace Mireon\SlidePanels\Properties;

use Mireon\SlidePanels\Components\Sides\Sides;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Attributes
 */
trait Side
{
    /**
     * ...
     *
     * @var string|null $side
     */
    private ?string $side = null;

    /**
     * ...
     *
     * @param string $side
     *   ...
     *
     * @return void
     */
    public function setSide(string $side): void
    {
        switch ($side) {
            case Sides::LEFT:
            case Sides::RIGHT:
                $this->side = $side;
        }
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getSide(): ?string
    {
        return $this->side;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasSide(): bool
    {
        return !is_null($this->side);
    }
}

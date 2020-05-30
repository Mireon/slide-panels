<?php

namespace Mireon\SlidePanels\Properties;

use Mireon\SlidePanels\Modules\Sides\Sides;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Properties
 */
trait SideProperty
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
     * @return self
     */
    public function side(string $side): self
    {
        $this->setSide($side);

        return $this;
    }

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

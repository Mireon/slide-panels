<?php

namespace Mireon\SlidePanels\Widgets;

use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Widgets
 */
abstract class Widget implements WidgetInterface
{
    use RenderToString;

    /**
     * ...
     *
     * @var int $weight
     */
    private int $weight = 0;

    /**
     * ...
     *
     * @param int $weight
     *   ...
     *
     * @return self
     */
    public function weight(int $weight): self
    {
        $this->setWeight($weight);

        return $this;
    }

    /**
     * ...
     *
     * @param int $weight
     *   ...
     *
     * @return void
     */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * ...
     *
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }
}

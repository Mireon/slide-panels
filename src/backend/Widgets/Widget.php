<?php

namespace Mireon\SlidePanels\Widgets;

use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * The base widget.
 *
 * @package Mireon\SlidePanels\Widgets
 */
abstract class Widget implements WidgetInterface
{
    use RenderToString;

    /**
     * The widget weight.
     *
     * @var int $weight
     */
    private int $weight = 0;

    /**
     * Sets the widget weight.
     *
     * @param int $weight
     *   A widget weight.
     *
     * @return self
     */
    public function weight(int $weight): self
    {
        $this->setWeight($weight);

        return $this;
    }

    /**
     * Sets the widget weight.
     *
     * @param int $weight
     *   A widget weight.
     *
     * @return void
     */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * Returns the widget weight.
     *
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }
}

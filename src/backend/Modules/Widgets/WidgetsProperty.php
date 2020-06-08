<?php

namespace Mireon\SlidePanels\Modules\Widgets;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets
 */
trait WidgetsProperty
{
    /**
     * ...
     *
     * @var WidgetInterface[] $widgets
     */
    private array $widgets = [];

    /**
     * ...
     *
     * @param WidgetInterface[] $widgets
     *   ...
     *
     * @return self
     *
     * @throws Exception
     */
    public function widgets(array $widgets): self
    {
        $this->setWidgets($widgets);

        return $this;
    }

    /**
     * ...
     *
     * @param WidgetInterface[] $widgets
     *   ...
     *
     * @return void
     *
     * @throws Exception
     */
    public function setWidgets(array $widgets): void
    {
        $this->widgets = [];

        foreach ($widgets as $widget) {
            $this->addWidget($widget);
        }
    }

    /**
     * ...
     *
     * @param WidgetInterface $widget
     *   ...
     *
     * @return self
     *
     * @throws Exception
     */
    public function widget(WidgetInterface $widget): self
    {
        $this->addWidget($widget);

        return $this;
    }

    /**
     * ...
     *
     * @param WidgetInterface $widget
     *   ...
     *
     * @return void
     *
     * @throws Exception
     */
    public function addWidget(WidgetInterface $widget): void
    {
        if ($widget->isValid()) {
            $this->widgets[] = $widget;
        } else {
            throw new Exception('Widget "' . get_class($widget) . '" is invalid.');
        }
    }

    /**
     * ...
     *
     * @return WidgetInterface[]
     */
    public function getWidgets(): array
    {
        usort($this->widgets, function (WidgetInterface $a, WidgetInterface $b) {
            return $a->getWeight() <=> $b->getWeight();
        });

        return $this->widgets;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasWidgets(): bool
    {
        return !empty($this->widgets);
    }
}

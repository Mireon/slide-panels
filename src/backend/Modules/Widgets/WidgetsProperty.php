<?php

namespace Mireon\SlidePanels\Modules\Widgets;

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
     */
    public function addWidget(WidgetInterface $widget): void
    {
        if ($widget->isValid()) {
            $this->widgets[] = $widget;
        }
    }

    /**
     * ...
     *
     * @return WidgetInterface[]|null
     */
    public function getWidgets(): ?array
    {
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

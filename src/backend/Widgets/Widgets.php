<?php

namespace Mireon\SlidePanels\Widgets;

use Exception;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RendererDefault;
use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Widgets
 */
class Widgets implements Renderable
{
    use RenderToString;

    /**
     * ...
     *
     * @var WidgetInterface[] $widgets
     */
    private array $widgets = [];

    /**
     * The constructor.
     *
     * @param WidgetInterface[] $widgets
     *   ...
     *
     * @throws Exception
     */
    public function __construct(array $widgets = [])
    {
        $this->setWidgets($widgets);
    }

    /**
     * ...
     *
     * @param array $widgets
     *   ...
     *
     * @return self
     *
     * @throws Exception
     */
    public static function create(array $widgets = []): self
    {
        return new self($widgets);
    }

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
        $this->reset();

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

    /**
     * ...
     *
     * @return void
     */
    public function reset(): void
    {
        $this->widgets = [];
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return RendererDefault::view('widgets/widgets', ['widgets' => $this]);
    }
}

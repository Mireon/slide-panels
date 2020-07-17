<?php

namespace Mireon\SlidePanels\Widgets;

use ArrayIterator;
use Exception;
use IteratorAggregate;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;
use Traversable;

/**
 * The widgets container.
 *
 * @package Mireon\SlidePanels\Widgets
 */
class Widgets implements WidgetsInterface, IteratorAggregate
{
    use RenderToString;

    /**
     * The list of widgets.
     *
     * @var WidgetInterface[] $widgets
     */
    private array $widgets = [];

    /**
     * The constructor.
     *
     * @param WidgetInterface[] $widgets
     *   A list of widgets.
     *
     * @throws Exception
     */
    public function __construct(array $widgets = [])
    {
        $this->setWidgets($widgets);
    }

    /**
     * Creates the widgets container.
     *
     * @param WidgetInterface[] $widgets
     *   A list of widgets.
     *
     * @return static
     *
     * @throws Exception
     */
    public static function create(array $widgets = []): self
    {
        return new static($widgets);
    }

    /**
     * Sets the list of widgets.
     *
     * @param WidgetInterface[] $widgets
     *   A list of widgets.
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
     * Sets the list of widgets.
     *
     * @param WidgetInterface[] $widgets
     *   A list of widgets.
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
     * @inheritDoc
     */
    public function getWidgets(): array
    {
        uasort($this->widgets, fn(WidgetInterface $a, WidgetInterface $b) => $a->getWeight() <=> $b->getWeight());

        return $this->widgets;
    }

    /**
     * @inheritDoc
     */
    public function hasWidgets(): bool
    {
        return !empty($this->widgets);
    }

    /**
     * Adds a new widget to the list.
     *
     * @param WidgetInterface $widget
     *   A new widget.
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
     * Adds a new widget to the list.
     *
     * @param WidgetInterface $widget
     *   A new widget.
     *
     * @return void
     *
     * @throws Exception
     */
    public function addWidget(WidgetInterface $widget): void
    {
        if (!$widget->isValid()) {
            throw new Exception('Widget "' . get_class($widget) . '" is invalid.');
        }

        if ($widget->hasKey()) {
            $this->widgets[$widget->getKey()] = $widget;
        } else {
            $this->widgets[] = $widget;
        }
    }

    /**
     * @inheritDoc
     */
    public function getWidget(string $key): ?WidgetInterface
    {
        return $this->widgets[$key] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function hasWidget(string $key): bool
    {
        return isset($this->widgets[$key]);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->getWidgets());
    }

    /**
     * Clears the list of widgets.
     *
     * @return void
     */
    public function reset(): void
    {
        $this->widgets = [];
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return Renderer::render('widgets/widgets', ['widgets' => $this]);
    }
}

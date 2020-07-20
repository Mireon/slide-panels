<?php

namespace Mireon\SlidePanels\Panels;

use Exception;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Widgets\WidgetInterface;
use Mireon\SlidePanels\Widgets\Widgets;
use Mireon\SlidePanels\Widgets\WidgetsInterface;

/**
 * The panel.
 *
 * @package Mireon\SlidePanels\Panels
 */
class Panel implements PanelInterface
{
    use RenderToString;

    /**
     * The left side position for a panel.
     */
    public const LEFT = 'left';

    /**
     * The right side position for a panel.
     */
    public const RIGHT = 'right';

    /**
     * The panel key.
     *
     * @var string|null
     */
    private ?string $key = null;

    /**
     * The panel side.
     *
     * @var string
     */
    private string $side = self::LEFT;

    /**
     * The panel styles.
     *
     * @var PanelParamsInterface|null
     */
    private ?PanelParamsInterface $params = null;

    /**
     * The widgets container.
     *
     * @var WidgetsInterface|null
     */
    private ?WidgetsInterface $widgets = null;

    /**
     * The constructor.
     *
     * @param string|null $key
     *   A panel key.
     * @param string|null $side
     *   A panel side.
     *
     * @throws Exception
     */
    public function __construct(?string $key = null, ?string $side = null)
    {
        $this->setParams(new PanelParams($this));
        $this->setWidgets(new Widgets());
        $this->setKey($key);
        $this->setSide($side);
    }

    /**
     * Creates an instance of this class.
     *
     * @param string|null $key
     *   A panel key.
     * @param string|null $side
     *   A panel side.
     *
     * @return static
     *
     * @throws Exception
     */
    public static function create(?string $key = null, ?string $side = null): self
    {
        return new static($key, $side);
    }

    /**
     * Sets the panel key.
     *
     * @param string|null $key
     *   A panel key.
     *
     * @return self
     */
    public function key(?string $key): self
    {
        $this->setKey($key);

        return $this;
    }

    /**
     * Sets the panel key.
     *
     * @param string|null $key
     *   A panel key.
     *
     * @return void
     */
    public function setKey(?string $key): void
    {
        $key = trim($key);
        $key = htmlspecialchars($key, ENT_QUOTES, 'UTF-8');
        $key = str_replace(' ', '-', $key);
        $key = mb_strtolower($key);

        $this->key = $key ?: null;
    }

    /**
     * @inheritDoc
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @inheritDoc
     */
    public function hasKey(): bool
    {
        return !is_null($this->key);
    }

    /**
     * Sets the panel side.
     *
     * @param string|null $side
     *   A panel side.
     *
     * @return self
     */
    public function side(?string $side): self
    {
        $this->setSide($side);

        return $this;
    }

    /**
     * Sets the panel side.
     *
     * @param string|null $side
     *   A panel side.
     *
     * @return void
     */
    public function setSide(?string $side): void
    {
        switch ($side) {
            case self::LEFT:
            case self::RIGHT:
                $this->side = $side;
                break;
        }
    }

    /**
     * @inheritDoc
     */
    public function getSide(): ?string
    {
        return $this->side;
    }

    /**
     * @inheritDoc
     */
    public function hasSide(): bool
    {
        return !is_null($this->side);
    }

    /**
     * Sets the panel width.
     *
     * @param int $width
     *   A panel width.
     *
     * @return self
     *
     * @throws Exception
     */
    public function width(int $width): self
    {
        $this->setWidth($width);

        return $this;
    }

    /**
     * Sets the panel width.
     *
     * @param int $width
     *   A panel width.
     *
     * @return void
     *
     * @throws Exception
     */
    public function setWidth(int $width): void
    {
        $this->params->setWidth($width);
    }

    /**
     * Sets the panel styles.
     *
     * @param PanelParamsInterface|null $params
     *   A panel styles.
     *
     * @return void
     */
    public function setParams(?PanelParamsInterface $params): void
    {
        $this->params = $params;
    }

    /**
     * @inheritDoc
     */
    public function getParams(): ?PanelParamsInterface
    {
        return $this->params;
    }

    /**
     * @inheritDoc
     */
    public function hasParams(): bool
    {
        return !is_null($this->params) && $this->params->isValid();
    }

    /**
     * Sets widgets.
     *
     * @param WidgetsInterface $widgets
     *   A widget container.
     *
     * @return self
     */
    public function widgets(WidgetsInterface $widgets): self
    {
        $this->setWidgets($widgets);

        return $this;
    }

    /**
     * Sets widgets.
     *
     * @param WidgetsInterface $widgets
     *   A widget container.
     *
     * @return void
     */
    public function setWidgets(WidgetsInterface $widgets): void
    {
        $this->widgets = $widgets;
    }

    /**
     * Adds a new widget to the container.
     *
     * @param WidgetInterface $widget
     *   A widget.
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
     * Adds a new widget to the container.
     *
     * @param WidgetInterface $widget
     *   A widget.
     *
     * @return void
     *
     * @throws Exception
     */
    public function addWidget(WidgetInterface $widget): void
    {
        $this->getWidgets()->addWidget($widget);
    }

    /**
     * @inheritDoc
     */
    public function getWidgets(): ?WidgetsInterface
    {
        return $this->widgets;
    }

    /**
     * @inheritDoc
     */
    public function hasWidgets(): bool
    {
        return !is_null($this->widgets);
    }

    /**
     * @inheritDoc
     */
    public function getWidget(string $key): ?WidgetInterface
    {
        return $this->getWidgets()->getWidget($key);
    }

    /**
     * @inheritDoc
     */
    public function hasWidget(string $key): bool
    {
        return $this->getWidgets()->hasWidget($key);
    }

    /**
     * Checks if a panel is valid.
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->hasKey();
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return Renderer::render('panels/panel', ['panel' => $this]);
    }
}

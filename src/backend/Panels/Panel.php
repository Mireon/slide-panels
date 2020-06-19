<?php

namespace Mireon\SlidePanels\Panels;

use Exception;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Widgets\WidgetInterface;
use Mireon\SlidePanels\Widgets\Widgets;

/**
 * The panel.
 *
 * @package Mireon\SlidePanels\Panels
 */
class Panel implements Renderable
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
     * @var PanelStyles|null
     */
    private ?PanelStyles $styles = null;

    /**
     * The widgets container.
     *
     * @var Widgets|null
     */
    private ?Widgets $widgets = null;

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
        $this->setStyles(new PanelStyles($this));
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
     * @return self
     *
     * @throws Exception
     */
    public static function create(?string $key = null, ?string $side = null): self
    {
        return new self($key, $side);
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
     * Returns a panel key.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * Checks if a panel key is defined.
     *
     * @return bool
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
     * Returns the panel side.
     *
     * @return string
     */
    public function getSide(): string
    {
        return $this->side;
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
        $this->styles->setWidth($width);
    }

    /**
     * Sets the panel styles.
     *
     * @param PanelStyles|null $styles
     *   A panel styles.
     *
     * @return void
     */
    private function setStyles(?PanelStyles $styles): void
    {
        $this->styles = $styles;
    }

    /**
     * @return PanelStyles|null
     */
    public function getStyles(): ?PanelStyles
    {
        return $this->styles;
    }

    /**
     * Checks if the panel style is defined.
     *
     * @return bool
     */
    public function hasStyles(): bool
    {
        return !is_null($this->styles) && $this->styles->isValid();
    }

    /**
     * Sets widgets.
     *
     * @param Widgets $widgets
     *   A widget container.
     *
     * @return self
     */
    public function widgets(Widgets $widgets): self
    {
        $this->setWidgets($widgets);

        return $this;
    }

    /**
     * Sets widgets.
     *
     * @param Widgets $widgets
     *   A widget container.
     *
     * @return void
     */
    public function setWidgets(Widgets $widgets): void
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
     * Returns the widgets container.
     *
     * @return Widgets|null
     */
    public function getWidgets(): ?Widgets
    {
        return $this->widgets;
    }

    /**
     * Checks if widgets exists.
     *
     * @return bool
     */
    public function hasWidgets(): bool
    {
        return !is_null($this->widgets);
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

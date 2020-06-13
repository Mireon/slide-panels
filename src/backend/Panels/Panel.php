<?php

namespace Mireon\SlidePanels\Panels;

use Exception;
use Mireon\SlidePanels\Renderer\RendererDefault;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Widgets\WidgetInterface;
use Mireon\SlidePanels\Widgets\Widgets;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Panels
 */
class Panel
{
    use RenderToString;

    /**
     * ...
     */
    public const LEFT = 'left';

    /**
     * ...
     */
    public const RIGHT = 'right';

    /**
     * ...
     *
     * @var string|null
     */
    private ?string $key = null;

    /**
     * ...
     *
     * @var string
     */
    private string $side = self::LEFT;

    /**
     * ...
     *
     * @var Widgets|null
     */
    private ?Widgets $widgets = null;

    /**
     * The constructor.
     *
     * @param string|null $key
     *   ...
     * @param string|null $side
     *   ...
     */
    public function __construct(?string $key = null, ?string $side = null)
    {
        $this->setKey($key);
        $this->setSide($side);
    }

    /**
     * Creates an instance of this class.
     *
     * @param string|null $key
     *   ...
     * @param string|null $side
     *   ...
     *
     * @return static
     */
    public static function create(?string $key = null, ?string $side = null): self
    {
        return new static($key, $side);
    }

    /**
     * ...
     *
     * @param string|null $key
     *   ...
     *
     * @return self
     */
    public function key(?string $key): self
    {
        $this->setKey($key);

        return $this;
    }

    /**
     * ...
     *
     * @param string|null $key
     *   ...
     *
     * @return void
     */
    public function setKey(?string $key): void
    {
        $key = trim($key);
        $key = htmlspecialchars($key, ENT_QUOTES, 'UTF-8');
        $key = str_replace(' ', '-', $key);

        $this->key = $key ?: null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @return bool
     */
    public function hasKey(): bool
    {
        return !is_null($this->key);
    }

    /**
     * ...
     *
     * @param string|null $side
     *   ...
     *
     * @return self
     */
    public function side(?string $side): self
    {
        $this->setSide($side);

        return $this;
    }

    /**
     * ...
     *
     * @param string|null $side
     *   ...
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
     * ...
     *
     * @return string
     */
    public function getSide(): string
    {
        return $this->side;
    }

    /**
     * ...
     *
     * @param Widgets|null $widgets
     *   ...
     *
     * @return self
     */
    public function widgets(?Widgets $widgets): self
    {
        $this->setWidgets($widgets);

        return $this;
    }

    /**
     * ...
     *
     * @param Widgets|null $widgets
     *   ...
     *
     * @return void
     */
    public function setWidgets(?Widgets $widgets): void
    {
        $this->widgets = $widgets;
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
        if (!$this->hasWidgets()) {
            $this->setWidgets(new Widgets());
        }

        $this->getWidgets()->addWidget($widget);
    }

    /**
     * ...
     *
     * @return Widgets|null
     */
    public function getWidgets(): ?Widgets
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
        return !is_null($this->widgets);
    }

    /**
     * ...
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->hasKey();
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return RendererDefault::view('panels/panel', ['panel' => $this]);
    }
}

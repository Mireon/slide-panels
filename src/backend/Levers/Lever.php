<?php

namespace Mireon\SlidePanels\Levers;

use Mireon\SlidePanels\Renderer\RendererInterface;
use Mireon\SlidePanels\Renderer\RendererProperty;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Widgets\Menu\ItemInterface;

/**
 * ... 
 * 
 * @package Mireon\SlidePanels\Levers
 */
class Lever implements ItemInterface
{
    use RenderToString;
    use RendererProperty;

    /**
     * ...
     */
    public const SHOW = 'show';

    /**
     * ...
     */
    public const HIDE = 'hide';

    /**
     * ...
     *
     * @var RendererInterface|null
     */
    private ?RendererInterface $renderer = null;

    /**
     * ...
     *
     * @var string|null
     */
    private ?string $text = null;

    /**
     * ...
     *
     * @var string|null
     */
    private ?string $panel = null;

    /**
     * ...
     *
     * @var string
     */
    private string $type = self::SHOW;

    /**
     * The constructor.
     *
     * @param string|null $text
     *   ...
     * @param string|null $panel
     *   ...
     * @param string|null $type
     *   ...
     */
    public function __construct(?string $text = null, ?string $panel = null, ?string $type = self::SHOW)
    {
        $this->setRenderer(new LeverRenderer());
        $this->setText($text);
        $this->setPanel($panel);
        $this->setType($type);
    }

    /**
     * Creates an instance of this class.
     *
     * @param string|null $text
     *   ...
     * @param string|null $panel
     *   ...
     * @param string|null $type
     *   ...
     *
     * @return static
     */
    public static function create(?string $text = null, ?string $panel = null, ?string $type = self::SHOW): self
    {
        return new static($text, $panel, $type);
    }

    /**
     * ...
     *
     * @param string|null $text
     *   ...
     * @param string|null $panel
     *   ...
     *
     * @return static
     */
    public static function show(?string $text = null, ?string $panel = null): self
    {
        return new static($text, $panel);
    }

    /**
     * ...
     *
     * @param string|null $text
     *   ...
     *
     * @return static
     */
    public static function hide(?string $text = null): self
    {
        return new static($text, null, self::HIDE);
    }

    /**
     * ...
     *
     * @param string|null $text
     *   ...
     *
     * @return self
     */
    public function text(?string $text): self
    {
        $this->setText($text);

        return $this;
    }

    /**
     * ...
     *
     * @param string|null $text
     *   ...
     *
     * @return void
     */
    public function setText(?string $text): void
    {
        $this->text = $text ?: null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasText(): bool
    {
        return !is_null($this->text);
    }

    /**
     * ...
     *
     * @param string|null $panel
     *   ...
     *
     * @return self
     */
    public function panel(?string $panel): self
    {
        $this->setPanel($panel);

        return $this;
    }

    /**
     * ...
     *
     * @param string|null $panel
     *   ...
     *
     * @return void
     */
    public function setPanel(?string $panel): void
    {
        $this->panel = $panel ?: null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getPanel(): ?string
    {
        return $this->panel;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasPanel(): bool
    {
        return !is_null($this->panel);
    }

    /**
     * ...
     *
     * @param string $type
     *   ...
     *
     * @return self
     */
    public function type(string $type): self
    {
        $this->setType($type);

        return $this;
    }

    /**
     * ...
     *
     * @param string $type
     *   ...
     *
     * @return void
     */
    public function setType(string $type): void
    {
        switch ($type) {
            case self::SHOW:
            case self::HIDE:
                $this->type = $type;
                break;
        }
    }

    /**
     * ...
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        switch ($this->getType()) {
            case self::SHOW:
                return $this->hasPanel() && $this->hasText();
            case self::HIDE:
                return $this->hasText();
            default:
                return false;
        }
    }
}

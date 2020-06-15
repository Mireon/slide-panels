<?php

namespace Mireon\SlidePanels\Widgets\Header;

use Exception;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Widgets\Widget;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Widgets\Header
 */
class Header extends Widget
{
    /**
     * ...
     */
    public const SMALL = 'small';

    /**
     * ...
     */
    public const BIG = 'big';

    /**
     * ...
     *
     * @var string
     */
    private string $size = self::BIG;

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
    private ?string $icon = null;

    /**
     * The constructor.
     *
     * @param string|null $text
     *   ...
     * @param string|null $icon
     *   ...
     * @param string|null $size
     *   ...
     */
    public function __construct(?string $text = null, ?string $icon = null, ?string $size = null)
    {
        $this->setText($text);
        $this->setIcon($icon);
        $this->setSize($size);
    }

    /**
     * Creates an instance of this class.
     *
     * @param string|null $text
     *   ...
     * @param string|null $icon
     *   ...
     * @param string|null $size
     *   ...
     *
     * @return static
     */
    public static function create(?string $text = null, ?string $icon = null, ?string $size = null): self
    {
        return new static($text, $icon, $size);
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
     * @param string|null $size
     *   ...
     *
     * @return self
     */
    public function size(?string $size): self
    {
        $this->setSize($size);

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
    public function setSize(?string $side): void
    {
        switch ($side) {
            case self::BIG:
            case self::SMALL:
                $this->size = $side;
                break;
        }
    }

    /**
     * ...
     *
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * ...
     *
     * @param string|null $icon
     *   ...
     *
     * @return self
     */
    public function icon(?string $icon): self
    {
        $this->setIcon($icon);

        return $this;
    }

    /**
     * ...
     *
     * @param string|null $icon
     *   ...
     *
     * @return void
     */
    public function setIcon(?string $icon): void
    {
        $this->icon = $icon ?: null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasIcon(): bool
    {
        return !is_null($this->icon);
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasText();
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Renderer::view('widgets/header/header', ['header' => $this]);
    }
}

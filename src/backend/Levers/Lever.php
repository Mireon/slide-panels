<?php

namespace Mireon\SlidePanels\Levers;

use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Widgets\Menu\ItemInterface;

/**
 * The lever to show of hide a panel.
 *
 * @package Mireon\SlidePanels\Levers
 */
class Lever implements ItemInterface
{
    use RenderToString;

    /**
     * The lever type to show the panel.
     */
    public const SHOW = 'show';

    /**
     * The lever type to hide the panel.
     */
    public const HIDE = 'hide';

    /**
     * The lever text.
     *
     * @var string|null
     */
    private ?string $text = null;

    /**
     * The panel key.
     *
     * @var string|null
     */
    private ?string $panel = null;

    /**
     * The lever type.
     *
     * @var string
     */
    private string $type = self::SHOW;

    /**
     * The constructor.
     *
     * @param string|null $text
     *   A lever text.
     * @param string|null $panel
     *   A panel key.
     * @param string|null $type
     *   A lever type.
     */
    public function __construct(?string $text = null, ?string $panel = null, ?string $type = self::SHOW)
    {
        $this->setText($text);
        $this->setPanel($panel);
        $this->setType($type);
    }

    /**
     * Creates a lever.
     *
     * @param string|null $text
     *   A lever text.
     * @param string|null $panel
     *   A panel key.
     * @param string|null $type
     *   A lever type.
     *
     * @return self
     */
    public static function create(?string $text = null, ?string $panel = null, ?string $type = self::SHOW): self
    {
        return new self($text, $panel, $type);
    }

    /**
     * Creates a lever to show a panel.
     *
     * @param string|null $text
     *   A lever text.
     * @param string|null $panel
     *   A panel key.
     *
     * @return self
     */
    public static function show(?string $text = null, ?string $panel = null): self
    {
        return new self($text, $panel);
    }

    /**
     * Creates a lever to hide a panel.
     *
     * @param string|null $text
     *   A lever text.
     *
     * @return self
     */
    public static function hide(?string $text = null): self
    {
        return new self($text, null, self::HIDE);
    }

    /**
     * Sets lever text.
     *
     * @param string|null $text
     *   A lever text.
     *
     * @return self
     */
    public function text(?string $text): self
    {
        $this->setText($text);

        return $this;
    }

    /**
     * Sets lever text.
     *
     * @param string|null $text
     *   A lever text.
     *
     * @return void
     */
    public function setText(?string $text): void
    {
        $this->text = $text ?: null;
    }

    /**
     * Returns the lever text.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Checks if a text is defined.
     *
     * @return bool
     */
    public function hasText(): bool
    {
        return !is_null($this->text);
    }

    /**
     * Sets a panel key.
     *
     * @param string|null $panel
     *   A panel key.
     *
     * @return self
     */
    public function panel(?string $panel): self
    {
        $this->setPanel($panel);

        return $this;
    }

    /**
     * Sets a panel key.
     *
     * @param string|null $panel
     *   A panel key.
     *
     * @return void
     */
    public function setPanel(?string $panel): void
    {
        $this->panel = $panel ?: null;
    }

    /**
     * Returns the panel key.
     *
     * @return string|null
     */
    public function getPanel(): ?string
    {
        return $this->panel;
    }

    /**
     * Checks if a panel key is defined.
     *
     * @return bool
     */
    public function hasPanel(): bool
    {
        return !is_null($this->panel);
    }

    /**
     * Sets a lever type.
     *
     * @param string $type
     *   A lever type.
     *
     * @return self
     */
    public function type(string $type): self
    {
        $this->setType($type);

        return $this;
    }

    /**
     * Sets a lever type.
     *
     * @param string|null $type
     *   A lever type.
     *
     * @return void
     */
    public function setType(?string $type): void
    {
        switch ($type) {
            case self::SHOW:
            case self::HIDE:
                $this->type = $type;
                break;
        }
    }

    /**
     * Returns the lever type.
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
        if ($this->getType() === self::SHOW) {
            return $this->hasPanel();
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return Renderer::render("levers/{$this->getType()}", ['lever' => $this]);
    }
}

<?php

namespace Mireon\SlidePanels\Widgets\Html;

use Mireon\SlidePanels\Widgets\Widget;

/**
 * The HTML widget.
 *
 * @package Mireon\SlidePanels\Widgets\Html
 */
class Html extends Widget
{
    /**
     * The HTML string.
     *
     * @var string
     */
    private ?string $html = null;

    /**
     * The constructor.
     *
     * @param string|null $html
     *   A HTML string.
     */
    public function __construct(?string $html = null)
    {
        $this->setHtml($html);
    }

    /**
     * Creates the HTML widget.
     *
     * @param string|null $html
     *   A HTML string.
     *
     * @return static
     */
    public static function create(?string $html = null): self
    {
        return new static($html);
    }

    /**
     * Sets the HTML string.
     *
     * @param string|null $html
     *   A HTML string.
     *
     * @return self
     */
    public function html(?string $html): self
    {
        $this->setHtml($html);

        return $this;
    }

    /**
     * Sets the HTML string.
     *
     * @param string|null $html
     *   A HTML string.
     *
     * @return void
     */
    public function setHtml(?string $html): void
    {
        $this->html = $html ?: null;
    }

    /**
     * Returns the HTML string.
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }

    /**
     * Checks if the HTML string is defined.
     *
     * @return bool
     */
    public function hasHtml(): bool
    {
        return !is_null($this->html);
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasHtml();
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return $this->getHtml() ?: '';
    }
}

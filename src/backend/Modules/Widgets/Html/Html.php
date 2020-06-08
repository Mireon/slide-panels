<?php

namespace Mireon\SlidePanels\Modules\Widgets\Html;

use Mireon\SlidePanels\Modules\Widgets\Widget;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets\Html
 */
class Html extends Widget
{
    /**
     * ...
     *
     * @var string
     */
    private ?string $html = null;

    /**
     * The constructor.
     *
     * @param string|null $html
     *   ...
     */
    public function __construct(?string $html = null)
    {
        if (!empty($html)) {
            $this->setHtml($html);
        }
    }

    /**
     * Creates an instance of this class.
     *
     * @param string|null $html
     *   ...
     *
     * @return self
     */
    public static function create(?string $html = null): self
    {
        return new self($html);
    }

    /**
     * ...
     *
     * @param string $html
     *   ...
     *
     * @return self
     */
    public function html(string $html): self
    {
        $this->setHtml($html);

        return $this;
    }

    /**
     * ...
     *
     * @param string $html
     *   ...
     *
     * @return void
     */
    public function setHtml(string $html): void
    {
        $this->html = $html ?: null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }

    /**
     * ...
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
        return $this->hasHtml() ? $this->getHtml() : '';
    }
}

<?php

namespace Mireon\SlidePanels\Modules\Levers;

use Exception;
use Mireon\SlidePanels\Modules\Widgets\Menu\ItemInterface;
use Mireon\SlidePanels\Properties\TextProperty;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * ... 
 * 
 * @package Mireon\SlidePanels\Modules\Levers
 */
class Lever implements ItemInterface
{
    use TextProperty;
    use RenderToString;

    /**
     * ...
     *
     * @var string|null $panel
     */
    private ?string $panel = null;

    /**
     * The constructor.
     *
     * @param string|null $text
     *   ...
     * @param string|null $panel
     *   ...
     */
    public function __construct(?string $text = null, ?string $panel = null)
    {
        if (!empty($text)) {
            $this->setText($text);
        }

        if (!empty($panel)) {
            $this->setPanel($panel);
        }
    }

    /**
     * Creates an instance of this class.
     *
     * @param string|null $text
     *   ...
     * @param string|null $panel
     *   ...
     *
     * @return self
     */
    public static function create(?string $text = null, ?string $panel = null): self
    {
        return new self($text, $panel);
    }

    /**
     * ...
     *
     * @param string $panel
     *   ...
     *
     * @return self
     */
    public function panel(string $panel): self
    {
        $this->setPanel($panel);

        return $this;
    }

    /**
     * ...
     *
     * @param string $panel
     *   ...
     *
     * @return void
     */
    public function setPanel(string $panel): void
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
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasPanel() && $this->hasText();
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Renderer::view('levers/lever', ['lever' => $this]);
    }
}

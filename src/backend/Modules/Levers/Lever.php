<?php

namespace Mireon\SlidePanels\Modules\Levers;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Location\Location;
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
     * @var Location|null $target
     */
    private ?Location $target = null;

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
        $this->setText($text);
        $this->setTarget($panel);
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
        return new static($text, $panel);
    }

    /**
     * ...
     *
     * @param string $panel
     *   ...
     *
     * @return self
     */
    public function target(string $panel): self
    {
        $this->setTarget($panel);

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
    public function setTarget(?string $panel): void
    {
        $this->target = new Location($panel);
    }

    /**
     * ...
     *
     * @return Location|null
     */
    public function getTarget(): ?Location
    {
        return $this->target;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasTarget(): bool
    {
        return !is_null($this->target);
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasTarget() &&
               $this->getTarget()->hasPanel() &&
               $this->hasText();
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('levers/lever', ['lever' => $this]);
    }
}

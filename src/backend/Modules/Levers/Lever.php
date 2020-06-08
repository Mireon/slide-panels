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
     * @param string|null $layer
     *   ...
     */
    public function __construct(?string $text = null, ?string $panel = null, ?string $layer = null)
    {
        $this->setText($text);
        $this->setTarget($panel, $layer);
    }

    /**
     * Creates an instance of this class.
     *
     * @param string|null $text
     *   ...
     * @param string|null $panel
     *   ...
     * @param string|null $layer
     *   ...
     *
     * @return self
     */
    public static function create(?string $text = null, ?string $panel = null, ?string $layer = null): self
    {
        return new static($text, $panel, $layer);
    }

    /**
     * ...
     *
     * @param string $panel
     *   ...
     * @param string $layer
     *   ...
     *
     * @return self
     */
    public function target(string $panel, ?string $layer = null): self
    {
        $this->setTarget($panel, $layer);

        return $this;
    }

    /**
     * ...
     *
     * @param string|null $panel
     *   ...
     * @param string|null $layer
     *   ...
     *
     * @return void
     */
    public function setTarget(?string $panel, ?string $layer = null): void
    {
        $this->target = new Location($panel, $layer);
    }

    /**
     * ...
     *
     * @return Location|null
     */
    public function getTarget(): ?Location
    {
        if (!$this->hasTarget()) {
            return null;
        }

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
               $this->getTarget()->hasLayer() &&
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

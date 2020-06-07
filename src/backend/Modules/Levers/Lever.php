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
     * Creates an instance of this class.
     *
     * @return static
     */
    public static function create(): self
    {
        return new static();
    }

    /**
     * ...
     *
     * @param Location $target
     *   ...
     *
     * @return self
     */
    public function target(Location $target): self
    {
        $this->setTarget($target);

        return $this;
    }

    /**
     * ...
     *
     * @param Location $target
     *   ...
     *
     * @return void
     */
    public function setTarget(Location $target): void
    {
        $this->target = $target ?: null;
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

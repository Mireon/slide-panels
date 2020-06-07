<?php

namespace Mireon\SlidePanels\Modules\Layers;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Modules\Layers\Components\Back;
use Mireon\SlidePanels\Modules\Widgets\WidgetsProperty;
use Mireon\SlidePanels\Properties\KeyProperty;
use Mireon\SlidePanels\Modules\Widgets\Header\HeaderProperty;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Location\LocationProperty;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Layers
 */
class Layer implements Renderable
{
    use KeyProperty;
    use HeaderProperty;
    use LocationProperty;
    use WidgetsProperty;
    use RenderToString;

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
     * @var Back|null $back
     */
    private ?Back $back = null;

    /**
     * ...
     *
     * @param Back $back
     *   ...
     *
     * @return void
     */
    private function setBack(Back $back): void
    {
        $this->back = $back;
    }

    /**
     * ...
     *
     * @return Back|null
     */
    public function getBack(): ?Back
    {
        return $this->back;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasBack(): bool
    {
        return !is_null($this->back) && $this->back->isValid();
    }

    /**
     * ...
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->hasKey() && $this->hasLocation() && $this->getLocation()->getPanel();
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('layers/layer', ['layer' => $this]);
    }
}

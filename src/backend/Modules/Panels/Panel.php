<?php

namespace Mireon\SlidePanels\Modules\Panels;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Properties\KeyProperty;
use Mireon\SlidePanels\Modules\Layers\Layers;
use Mireon\SlidePanels\Modules\Widgets\Header\HeaderProperty;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Methods\CreateMethod;
use Mireon\SlidePanels\Location\LocationProperty;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Panels
 */
class Panel implements Renderable
{
    use KeyProperty;
    use HeaderProperty;
    use LocationProperty;
    use CreateMethod;
    use RenderToString;

    /**
     * ...
     *
     * @var Layers|null $layers
     */
    private ?Layers $layers = null;

    /**
     * ...
     *
     * @param Layers $layers
     *   ...
     *
     * @return self
     */
    public function layers(Layers $layers): self
    {
        $this->setLayers($layers);

        return $this;
    }

    /**
     * ...
     *
     * @param Layers $layers
     *   ...
     *
     * @return void
     */
    public function setLayers(Layers $layers): void
    {
        $this->layers = $layers;
    }

    /**
     * ...
     *
     * @return Layers|null
     */
    public function getLayers(): ?Layers
    {
        return $this->layers;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasLayers(): bool
    {
        return !is_null($this->layers);
    }

    /**
     * ...
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->hasKey() && $this->hasLocation() && $this->getLocation()->hasSide();
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('panels/panel', ['panel' => $this]);
    }
}

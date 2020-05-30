<?php

namespace Mireon\SlidePanels\Modules\Panels;

use Exception;
use Mireon\SlidePanels\Modules\Layers\Layer;
use Mireon\SlidePanels\Properties\KeyProperty;
use Mireon\SlidePanels\Modules\Layers\Layers;
use Mireon\SlidePanels\Modules\Widgets\Header\HeaderProperty;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;
use Mireon\SlidePanels\Methods\CreateMethod;
use Mireon\SlidePanels\Target\TargetProperty;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Panels
 */
class Panel implements Renderable
{
    use KeyProperty;
    use HeaderProperty;
    use TargetProperty;
    use CreateMethod;
    use RenderString;

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
        return $this->hasKey() && $this->hasTarget() && $this->getTarget()->hasSide();
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Render::view('panels/panel', ['panel' => $this]);
    }
}

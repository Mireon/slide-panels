<?php

namespace Mireon\SlidePanels\Modules\Panels;

use Exception;
use Mireon\SlidePanels\Properties\Key;
use Mireon\SlidePanels\Properties\Side;
use Mireon\SlidePanels\Modules\Layers\Layers;
use Mireon\SlidePanels\Modules\Widgets\Header\HeaderProperty;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Panels
 */
class Panel implements Renderable
{
    use RenderString;
    use Side;
    use Key;
    use HeaderProperty;

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
        return $this->hasKey() && $this->hasSide();
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

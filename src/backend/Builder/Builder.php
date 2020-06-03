<?php

namespace Mireon\SlidePanels\Builder;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Modules\Layers\Exceptions\LayerIsUndefined;
use Mireon\SlidePanels\Modules\Layers\Layer;
use Mireon\SlidePanels\Modules\Layers\Layers;
use Mireon\SlidePanels\Modules\Panels\Exceptions\PanelIsUndefined;
use Mireon\SlidePanels\Modules\Panels\Panel;
use Mireon\SlidePanels\Modules\Panels\Panels;
use Mireon\SlidePanels\Modules\Stage\Stage;
use Mireon\SlidePanels\Location\Location;
use Mireon\SlidePanels\Renderer\Renderable;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Builder
 */
class Builder implements Renderable
{
    /**
     * ...
     *
     * @var Stage|null
     */
    private ?Stage $stage = null;

    /**
     * ...
     *
     * @return Stage
     */
    private function getStage(): Stage
    {
        if (is_null($this->stage)) {
            $this->stage = new Stage();
        }

        return $this->stage;
    }

    /**
     * ...
     *
     * @return Panels
     */
    private function getPanels(): Panels
    {
        $stage = $this->getStage();

        if (!$stage->hasPanels()) {
            $stage->setPanels(new Panels());
        }

        return $stage->getPanels();
    }

    /**
     * ...
     *
     * @param string $key
     *   ...
     *
     * @return Panel
     *
     * @throws PanelIsUndefined
     */
    private function getPanel(string $key): Panel
    {
        if (empty($key)) {
            throw new PanelIsUndefined();
        }

        $panels = $this->getPanels();

        if (!$panels->hasPanel($key)) {
            $panel = new Panel();
            $panel->setKey($key);

            $panels->addPanel($panel);
        }

        return $panels->getPanel($key);
    }

    /**
     * ...
     *
     * @param Location $location
     *   ...
     *
     * @return Layers
     *
     * @throws PanelIsUndefined
     */
    private function getLayers(Location $location): Layers
    {
        $panel = $this->getPanel($location->getPanel());

        if (!$panel->hasLayers()) {
            $panel->setLayers(new Layers());
        }

        return $panel->getLayers();
    }

    /**
     * ...
     *
     * @param Location $location
     *   ...
     *
     * @return Layer
     *
     * @throws LayerIsUndefined
     * @throws PanelIsUndefined
     */
    private function getLayer(Location $location): Layer
    {
        if (!$location->hasLayer()) {
            throw new LayerIsUndefined();
        }

        $layers = $this->getLayers($location);

        if (!$layers->hasLayer($location->getLayer())) {
            $layer = new Layer();
            $layer->setKey($location->getLayer());
            $layer->setLocation($location->getClone());

            $layers->addLayer($layer);
        }

        return $layers->getLayer($location->getLayer());
    }

    /**
     * ...
     *
     * @param Panel $panel
     *   ...
     *
     * @return self
     */
    public function panel(Panel $panel): self
    {
        $this->getPanels()->addPanel($panel);

        return $this;
    }

    /**
     * ...
     *
     * @param Layer $layer
     *   ...
     *
     * @return self
     *
     * @throws PanelIsUndefined
     */
    public function layer(Layer $layer): self
    {
        $this->getLayers($layer->getLocation())->addLayer($layer);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return $this->stage->render();
    }
}

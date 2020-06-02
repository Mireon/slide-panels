<?php

namespace Mireon\SlidePanels\Builder;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Modules\Layers\Exceptions\LayerIsUndefined;
use Mireon\SlidePanels\Modules\Layers\Layer;
use Mireon\SlidePanels\Modules\Layers\Layers;
use Mireon\SlidePanels\Modules\Panels\Exceptions\PanelIsUndefined;
use Mireon\SlidePanels\Modules\Panels\Panel;
use Mireon\SlidePanels\Modules\Panels\Panels;
use Mireon\SlidePanels\Modules\Sides\Exceptions\SideIsInvalid;
use Mireon\SlidePanels\Modules\Sides\Exceptions\SideIsUndefined;
use Mireon\SlidePanels\Modules\Sides\Side;
use Mireon\SlidePanels\Modules\Sides\SideLeft;
use Mireon\SlidePanels\Modules\Sides\SideRight;
use Mireon\SlidePanels\Modules\Sides\Sides;
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
     * @return Sides
     */
    public function getSides(): Sides
    {
        $stage = $this->getStage();

        if (!$stage->hasSides()) {
            $stage->setSides(new Sides());
        }

        return $stage->getSides();
    }

    /**
     * ...
     *
     * @param Location $location
     *   ...
     *
     * @return Side
     *
     * @throws SideIsUndefined
     */
    private function getSide(Location $location): Side
    {
        if (!$location->hasSide()) {
            throw new SideIsUndefined();
        }

        $sides = $this->getSides();

        if (!$sides->hasSide($location->getSide())) {
            switch ($location->getSide()) {
                case Sides::LEFT:
                    $sides->setLeft(new SideLeft());
                    break;
                case Sides::RIGHT:
                    $sides->setRight(new SideRight());
                    break;
                default:
                    throw new SideIsInvalid;
            }
        }

        return $sides->getSide($location->getSide());
    }

    /**
     * ...
     *
     * @param Location $location
     *   ...
     *
     * @return Panels
     *
     * @throws SideIsUndefined
     */
    private function getPanels(Location $location): Panels
    {
        $side = $this->getSide($location);

        if (!$side->hasPanels()) {
            $side->setPanels(new Panels());
        }

        return $side->getPanels();
    }

    /**
     * ...
     *
     * @param Location $location
     *   ...
     *
     * @return Panel
     *
     * @throws PanelIsUndefined
     * @throws SideIsUndefined
     */
    private function getPanel(Location $location): Panel
    {
        if (!$location->hasPanel()) {
            throw new PanelIsUndefined();
        }

        $panels = $this->getPanels($location);

        if (!$panels->hasPanel($location->getPanel())) {
            $panel = new Panel();
            $panel->setKey($location->getPanel());
            $panel->setLocation($location->createForPanel());

            $panels->addPanel($panel);
        }

        return $panels->getPanel($location->getPanel());
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
     * @throws SideIsUndefined
     */
    private function getLayers(Location $location): Layers
    {
        $panel = $this->getPanel($location);

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
     * @throws SideIsUndefined
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
            $layer->setLocation($location->createForLayer());

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
     *
     * @throws SideIsUndefined
     */
    public function panel(Panel $panel): self
    {
        $this->getPanels($panel->getLocation())->addPanel($panel);

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
     * @throws SideIsUndefined
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

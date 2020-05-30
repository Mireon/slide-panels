<?php

namespace Mireon\SlidePanels\Modules;

use Mireon\SlidePanels\Methods\CreateMethod;
use Mireon\SlidePanels\Modules\Layers\Layer;
use Mireon\SlidePanels\Modules\Panels\Panel;
use Mireon\SlidePanels\Modules\Sides\SideLeft;
use Mireon\SlidePanels\Modules\Sides\SideRight;
use Mireon\SlidePanels\Modules\Sides\Sides;
use Mireon\SlidePanels\Modules\Stage\Stage;
use Mireon\SlidePanels\Target\Target;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules
 */
class SlidePanelsBuilder
{
    use CreateMethod;

    /**
     * ...
     *
     * @param Target $target
     *   ...
     *
     * @return void
     */
    private function buildByTarget(Target $target): void
    {
        $instance = SlidePanels::instance();

        if (!$instance->hasStage()) {
            $instance->setStage(new Stage());
        }

        $stage = $instance->getStage();

        if ($target->hasSide()) {
            if (!$stage->hasSides()) {
                $stage->setSides(new Sides());
            }

            $sides = $stage->getSides();

            if (!$sides->hasSide($target->getSide())) {
                switch ($target->getSide()) {
                    case Sides::LEFT:
                        $sides->setLeft(new SideLeft());
                        break;
                    case Sides::RIGHT:
                        $sides->setRight(new SideRight());
                        break;
                }
            }
        }

        if ($target->hasPanel()) {
            
        }
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
        SlidePanels::instance()
            ->getStage()
            ->getSides()
            ->getSide($panel->getTarget()->getSide())
            ->getPanels()
            ->addPanel($panel);

        return $this;
    }

    /**
     * ...
     *
     * @param Layer $layer
     *   ...
     *
     * @return self
     */
    public function layer(Layer $layer): self
    {
        SlidePanels::instance()
            ->getStage()
            ->getSides()
            ->getSide($layer->getTarget()->getSide())
            ->getPanels()
            ->getPanel($layer->getTarget()->getPanel())
            ->getLayers()
            ->addLayer($layer);

        return $this;
    }
}

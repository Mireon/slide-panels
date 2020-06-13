<?php

namespace Mireon\SlidePanels\Designer;

use Exception;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\Panels;
use Mireon\SlidePanels\Stage\Stage;
use Mireon\SlidePanels\Renderer\Renderable;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Designer
 */
class Designer implements Renderable
{
    /**
     * The list of builder events.
     *
     * @var FactoryInterface[] $factories
     */
    private array $factories = [];

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
    private function getOrCreateStage(): Stage
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
    private function getOrCreatePanels(): Panels
    {
        $stage = $this->getOrCreateStage();

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
     * @throws Exception
     */
    public function panel(string $key): Panel
    {
        if (empty($key)) {
            throw new Exception('The panel key is undefined.');
        }

        $panels = $this->getOrCreatePanels();

        if (!$panels->hasPanel($key)) {
            $panels->addPanel(new Panel($key));
        }

        return $panels->getPanel($key);
    }

    /**
     * ...
     *
     * @param string $factory
     *   ...
     *
     * @return self
     *
     * @throws Exception
     */
    public function factory($factory): self
    {
        if (is_string($factory)) {
            if (!class_exists($factory)) {
                throw new Exception("The class \"$factory\" not found.");
            }

            $factory = new $factory();
        }

        if (is_object($factory)) {
            if (!($factory instanceof FactoryInterface)) {
                throw new Exception('
                    The class "' . get_class($factory) . '" doesn\'t implement 
                    the "' . FactoryInterface::class . '" interface.
                ');
            }
        } else {
            throw new Exception('The factory entity is invalid.');
        }

        $this->factories[get_class($factory)] = $factory;

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        foreach ($this->factories as $factory) {
            if ($factory->doMake()) {
                $factory->make($this);
            }
        }

        return $this->getOrCreateStage()->render();
    }
}

<?php

namespace Mireon\SlidePanels\Designer;

use Exception;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\Panels;
use Mireon\SlidePanels\Stage\Stage;

/**
 * The panels designer.
 *
 * @package Mireon\SlidePanels\Designer
 */
class Designer
{
    /**
     * The list of factories.
     *
     * @var FactoryInterface[]
     */
    private array $factories = [];

    /**
     * The stage.
     *
     * @var Stage|null
     */
    private ?Stage $stage = null;

    /**
     * The constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->stage = new Stage();
        $this->stage->setPanels(new Panels());
    }

    /**
     * Returns a panel by key.
     *
     * If a panel with the entered key doesn't created it will be created.
     *
     * @param string $key
     *   A panel key.
     *
     * @return Panel
     *
     * @throws Exception
     */
    public function panel(string $key): Panel
    {
        if (empty($key)) {
            throw new Exception('Panel key is undefined.');
        }

        $panels = $this->stage->getPanels();

        if (!$panels->hasPanel($key)) {
            $panels->addPanel(new Panel($key));
        }

        return $panels->getPanel($key);
    }

    /**
     * Adds a new factory object to the list.
     *
     * @param FactoryInterface|string $factory
     *   A factory object or factory class name.
     *
     * @return self
     *
     * @throws Exception
     */
    public function factory($factory): self
    {
        if (!is_string($factory) && !is_object($factory)) {
            throw new Exception('Factory is invalid. A factory must be a class name or factory object.');
        }

        if (is_string($factory) && !class_exists($factory)) {
            throw new Exception("Class \"$factory\" not found.");
        }

        if (is_string($factory)) {
            $factory = new $factory();
        }

        $class = get_class($factory);

        if (!($factory instanceof FactoryInterface)) {
            $interface = FactoryInterface::class;
            throw new Exception("The class \"$class\" does not implement the \"$interface\" interface.");
        }

        $this->factories[$class] = $factory;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        foreach ($this->factories as $factory) {
            if ($factory->doMake()) {
                $factory->make($this);
            }
        }

        return $this->stage->render();
    }
}

<?php

namespace Mireon\SlidePanels\Designer;

use Exception;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\PanelInterface;
use Mireon\SlidePanels\Panels\Panels;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Stage\Stage;
use Mireon\SlidePanels\Stage\StageInterface;

/**
 * The panels designer.
 *
 * @package Mireon\SlidePanels\Designer
 */
class Designer implements DesignerInterface
{
    use RenderToString;

    /**
     * The list of factories.
     *
     * @var FactoryInterface[]
     */
    private array $factories = [];

    /**
     * The stage.
     *
     * @var StageInterface|null
     */
    private ?StageInterface $stage = null;

    /**
     * The constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->setStage(new Stage(new Panels()));
    }

    /**
     * Sets the stage.
     *
     * @param StageInterface $stage
     *   A stage.
     *
     * @return void
     */
    public function setStage(StageInterface $stage): void
    {
        $this->stage = $stage;
    }

    /**
     * Returns the stage.
     *
     * @return StageInterface|null
     */
    public function getStage(): ?StageInterface
    {
        return $this->stage;
    }

    /**
     * Checks if the stage is defined.
     *
     * @return bool
     */
    public function hasStage(): bool
    {
        return is_null($this->hasStage());
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function getPanel(string $key): PanelInterface
    {
        if (empty($key)) {
            throw new Exception('Panel key is undefined.');
        }

        $panels = $this->getStage()->getPanels();

        if (!$panels->hasPanel($key)) {
            $panels->addPanel(new Panel($key));
        }

        return $panels->getPanel($key);
    }

    /**
     * Adds a list factories to the list factories.
     *
     * @param FactoryInterface[]|string[] $factories
     *   A list of factory objects or factory class names.
     * @param bool $isReplace
     *   If true, the current list will be clear.
     *
     * @return self
     *
     * @throws Exception
     */
    public function factories(array $factories, bool $isReplace = false): self
    {
        if ($isReplace) {
            $this->setFactories($factories);
        } else {
            $this->addFactories($factories);
        }

        return $this;
    }

    /**
     * Sets a list factories.
     *
     * @param FactoryInterface[]|string[] $factories
     *   A list of factory objects or factory class names.
     *
     * @return void
     *
     * @throws Exception
     */
    public function setFactories(array $factories): void
    {
        $this->factories = [];
        $this->addFactories($factories);
    }

    /**
     * Adds a list factories to the list factories.
     *
     * @param FactoryInterface[]|string[] $factories
     *   A list of factory objects or factory class names.
     *
     * @return void
     *
     * @throws Exception
     */
    public function addFactories(array $factories): void
    {
        foreach($factories as $factory) {
            $this->factory($factory);
        }
    }

    /**
     * Adds a factory to the list.
     *
     * @param FactoryInterface|string $factory
     *   A factory object or factory class name.
     *
     * @return Designer
     *
     * @throws Exception
     */
    public function factory($factory): self
    {
        $this->addFactory($factory);

        return $this;
    }

    /**
     * Adds a factory to the list.
     *
     * @param FactoryInterface|string $factory
     *   A factory object or factory class name.
     *
     * @return void
     *
     * @throws Exception
     */
    public function addFactory($factory): void
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

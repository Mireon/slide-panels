<?php

namespace Mireon\SlidePanels;

use Exception;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\Panels\PanelInterface;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Stage\Stage;
use Mireon\SlidePanels\Stage\StageInterface;

/**
 * The main class.
 *
 * @package Mireon\SlidePanels
 */
class SlidePanels implements SlidePanelsInterface
{
    use RenderToString;

    /**
     * The instance this class.
     *
     * @var static|null $instance
     */
    private static ?self $instance = null;

    /**
     * The list of factories.
     *
     * @var PanelFactoryInterface[]
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
     */
    protected function __construct()
    {
        $this->setStage(new Stage());
    }

    /**
     * The "clone" magic method.
     *
     * @return void
     */
    private function __clone()
    {
        //
    }

    /**
     * The "wakeup" magic method.
     *
     * @throws Exception
     */
    public function __wakeup(): void
    {
        throw new Exception('Cannot unserialize the \"' . static::class . '\" class.');
    }

    /**
     * The "unserialize" magic method.
     *
     * @param array $data
     *   A list of data.
     *
     * @throws Exception
     */
    public function __unserialize(array $data): void
    {
        throw new Exception('Cannot unserialize the \"' . static::class . '\" class.');
    }

    /**
     * @inheritDoc
     */
    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
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
        return is_null($this->stage);
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
            $panels->createPanel($key);
        }

        return $panels->getPanel($key);
    }

    /**
     * Adds a list factories to the list factories.
     *
     * @param PanelFactoryInterface[]|string[] $factories
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
     * @param PanelFactoryInterface[]|string[] $factories
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
     * Returns the list of factories.
     *
     * @return PanelFactoryInterface[]
     */
    public function getFactories(): array
    {
        return $this->factories;
    }

    /**
     * Adds a list factories to the list factories.
     *
     * @param PanelFactoryInterface[]|string[] $factories
     *   A list of factory objects or factory class names.
     *
     * @return void
     *
     * @throws Exception
     */
    public function addFactories(array $factories): void
    {
        foreach ($factories as $factory) {
            $this->factory($factory);
        }
    }

    /**
     * Adds a factory to the list.
     *
     * @param PanelFactoryInterface|string $factory
     *   A factory object or factory class name.
     *
     * @return self
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
     * @param PanelFactoryInterface|string $factory
     *   A factory object or factory class name.
     *
     * @return void
     *
     * @throws Exception
     */
    public function addFactory($factory): void
    {
        $factory = $this->createFactory($factory);
        $name = get_class($factory);

        if ($factory->doMake()) {
            $this->factories[$name] = $factory;
        }
    }

    /**
     * Returns a factory.
     *
     * @param string $name
     *   A factory class name.
     *
     * @return PanelFactoryInterface|null
     */
    public function getFactory(string $name): ?PanelFactoryInterface
    {
        return $this->factories[$name] ?? null;
    }

    /**
     * Creates an instance of factory.
     *
     * @param PanelFactoryInterface|string $factory
     *   A factory object or factory class name.
     *
     * @return PanelFactoryInterface
     *
     * @throws Exception
     */
    public function createFactory($factory): PanelFactoryInterface
    {
        if (!is_string($factory) && !is_object($factory)) {
            throw new Exception('Factory is invalid. A factory must be a class name or factory object.');
        }

        if (is_string($factory)) {
            $factory = $this->createFactoryFromString($factory);
        }

        if (!($factory instanceof PanelFactoryInterface)) {
            $interface = PanelFactoryInterface::class;
            $class = get_class($factory);

            throw new Exception("The class \"$class\" does not implement the \"$interface\" interface.");
        }

        return $factory;
    }

    /**
     * Creates an instance of factory from the class name.
     *
     * @param string $factory
     *   A factory class name.
     *
     * @return object
     */
    public function createFactoryFromString(string $factory): object
    {
        return new $factory();
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        foreach ($this->factories as $factory) {
            $factory->make($this);
        }

        return $this->stage->render();
    }
}

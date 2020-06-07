<?php

namespace Mireon\SlidePanels;

use Mireon\SlidePanels\Builder\Builder;
use Mireon\SlidePanels\Builder\BuilderEvent;
use Mireon\SlidePanels\Builder\BuilderEventException;
use Mireon\SlidePanels\Exceptions\CannotUnserialize;
use Mireon\SlidePanels\Exceptions\ClassNotFound;
use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * ...
 *
 * @package Mireon\SlidePanels
 */
class SlidePanels implements Renderable
{
    use RenderToString;

    /**
     * The instance this class.
     *
     * @var self|null $instance
     */
    protected static ?self $instance = null;

    /**
     * The list of builder events.
     *
     * @var BuilderEvent[] $events
     */
    protected array $events = [];

    /**
     * The constructor.
     */
    protected function __construct() {}

    /**
     * The magic method clone.
     *
     * @return void
     */
    protected function __clone() {}

    /**
     * The magic method wakeup.
     *
     * @return void
     *
     * @throws CannotUnserialize
     */
    public function __wakeup(): void
    {
        throw new CannotUnserialize(static::class);
    }

    /**
     * The magic method unserialize.
     *
     * @param array $data
     *   An array of data.
     *
     * @return void
     *
     * @throws CannotUnserialize
     */
    public function __unserialize(array $data): void
    {
        throw new CannotUnserialize(static::class);
    }

    /**
     * Returns an instance this class.
     *
     * @return static
     */
    public static function instance(): self
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * ...
     *
     * @param string $class
     *   ...
     *
     * @return self
     *
     * @throws BuilderEventException
     * @throws ClassNotFound
     */
    public function add(string $class): self
    {
        if (!class_exists($class)) {
            throw new ClassNotFound($class);
        }

        $class = new $class();

        if (!($class instanceof BuilderEvent)) {
            throw new BuilderEventException($class);
        }

        $this->events[] = $class;

        return $this;
    }

    /**
     * ...
     *
     * @return Builder
     */
    public function build(): Builder
    {
        $builder = new Builder();

        foreach ($this->events as $event) {
            if ($event->doBuild()) {
                $event->build($builder);
            }
        }

        return $builder;
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return $this->build()->render();
    }
}

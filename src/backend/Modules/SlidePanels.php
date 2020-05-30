<?php

namespace Mireon\SlidePanels\Modules;

use Exception;
use Mireon\SlidePanels\Modules\Stage\Stage;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules
 */
class SlidePanels implements Renderable
{
    use RenderString;

    /**c
     * ...
     *
     * @var self|null
     */
    private static ?self $instance = null;

    /**
     * ...
     *
     * @var Stage|null
     */
    private ?Stage $stage = null;

    /**
     * The constructor.
     */
    protected function __construct() {}

    /**
     * ...
     */
    protected function __clone() {}

    /**
     * ...
     *
     * @throws Exception
     */
    public function __wakeup(): void
    {
        throw new Exception('Cannot unserialize the ' . static::class . ' class.');
    }

    /**
     * ...
     *
     * @param array $data
     *  ...
     *
     * @throws Exception
     */
    public function __unserialize(array $data): void
    {
        throw new Exception('Cannot unserialize the ' . static::class . ' class.');
    }

    /**
     * ...
     *
     * @return self
     */
    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * ...
     *
     * @param Stage $stage
     *   ...
     *
     * @return self
     */
    public function stage(Stage $stage): self
    {
        $this->setStage($stage);

        return $this;
    }

    /**
     * ...
     *
     * @param Stage $stage
     *   ...
     *
     * @return void
     */
    public function setStage(Stage $stage): void
    {
        $this->stage = $stage;
    }

    /**
     * ...
     *
     * @return Stage|null
     */
    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasStage(): bool
    {
        return !is_null($this->stage);
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return $this->stage->render();
    }
}

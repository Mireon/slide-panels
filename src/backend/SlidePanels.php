<?php

namespace Mireon\SlidePanels;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
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
    private static ?self $instance = null;

    /**
     * ...
     *
     * @var Designer|null $designer
     */
    private ?Designer $designer = null;

    /**
     * The constructor.
     */
    private function __construct() {
        $this->setDesigner(new Designer());
    }

    /**
     * The magic method clone.
     *
     * @return void
     */
    private function __clone() {}

    /**
     * The magic method wakeup.
     *
     * @return void
     *
     * @throws Exception
     */
    public function __wakeup(): void
    {
        throw new Exception('Cannot unserialize the \"' . static::class . '\" class.');
    }

    /**
     * The magic method unserialize.
     *
     * @param array $data
     *   An array of data.
     *
     * @return void
     *
     * @throws Exception
     */
    public function __unserialize(array $data): void
    {
        throw new Exception('Cannot unserialize the \"' . static::class . '\" class.');
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
     * @param Designer|null $designer
     *   ...
     *
     * @return Designer
     */
    public static function designer(?Designer $designer = null): Designer
    {
        if (!is_null($designer)) {
            static::instance()->setDesigner($designer);
        }

        return static::instance()->getDesigner();
    }

    /**
     * ...
     *
     * @param Designer $designer
     *   ...
     *
     * @return void
     */
    public function setDesigner(Designer $designer): void
    {
        $this->designer = $designer;
    }

    /**
     * ...
     *
     * @return Designer|null
     */
    public function getDesigner(): ?Designer
    {
        return $this->designer;
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return $this->getDesigner()->render();
    }
}

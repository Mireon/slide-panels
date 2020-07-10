<?php

namespace Mireon\SlidePanels;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;

/**
 * The main class.
 *
 * @package Mireon\SlidePanels
 */
class SlidePanels implements Renderable
{
    use RenderToString;

    /**
     * The instance this class.
     *
     * @var static|null $instance
     */
    private static ?self $instance = null;

    /**
     * The panels designer.
     *
     * @var Designer|null $designer
     */
    private ?Designer $designer = null;

    /**
     * The constructor.
     */
    private function __construct()
    {
        $this->designer = new Designer();
    }

    /**
     * The magic method clone.
     *
     * @return void
     */
    private function __clone()
    {
        //
    }

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
     * @return self
     */
    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Returns the designer panels.
     *
     * @return Designer
     */
    public static function designer(): Designer
    {
        return self::instance()->designer;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return $this->designer->render();
    }
}

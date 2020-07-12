<?php

namespace Mireon\SlidePanels;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Designer\DesignerInterface;
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
     * @var DesignerInterface|null $designer
     */
    private ?DesignerInterface $designer = null;

    /**
     * The constructor.
     */
    protected function __construct()
    {
        //
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
     * Returns an instance this class.
     *
     * @return static
     */
    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * ...
     *
     * @param DesignerInterface $designer
     *   ...
     *
     * @return void
     */
    public static function setDesigner(DesignerInterface $designer): void
    {
        self::getInstance()->designer = $designer;
    }

    /**
     * Returns the designer of panels.
     *
     * @return DesignerInterface
     *
     * @throws Exception
     */
    public static function getDesigner(): DesignerInterface
    {
        if (is_null(self::getInstance()->designer)) {
            self::getInstance()->designer = new Designer();
        }

        return self::getInstance()->designer;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return $this->designer->render();
    }
}

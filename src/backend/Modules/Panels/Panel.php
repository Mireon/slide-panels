<?php

namespace Mireon\SlidePanels\Modules\Panels;

use Exception;
use Mireon\SlidePanels\Modules\Widgets\WidgetsProperty;
use Mireon\SlidePanels\Properties\KeyProperty;
use Mireon\SlidePanels\Modules\Widgets\Header\HeaderProperty;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Panels
 */
class Panel implements Renderable
{
    use KeyProperty;
    use HeaderProperty;
    use WidgetsProperty;
    use RenderToString;

    /**
     * ...
     */
    public const LEFT = 'left';

    /**
     * ...
     */
    public const RIGHT = 'right';

    /**
     * ...
     *
     * @var string $side
     */
    private string $side = self::LEFT;

    /**
     * The constructor.
     *
     * @param string|null $key
     *   ...
     * @param string|null $side
     *   ...
     */
    public function __construct(?string $key = null, ?string $side = null)
    {
        if (!empty($key)) {
            $this->setKey($key);
        }

        if (!empty($side)) {
            $this->setSide($side);
        }
    }

    /**
     * Creates an instance of this class.
     *
     * @param string|null $key
     *   ...
     * @param string|null $side
     *   ...
     *
     * @return static
     */
    public static function create(?string $key = null, ?string $side = null): self
    {
        return new static($key, $side);
    }

    /**
     * ...
     *
     * @param string $side
     *   ...
     *
     * @return self
     */
    public function side(string $side): self
    {
        $this->setSide($side);

        return $this;
    }

    /**
     * ...
     *
     * @param string $side
     *   ...
     *
     * @return void
     */
    public function setSide(string $side): void
    {
        switch ($side) {
            case self::LEFT:
            case self::RIGHT:
                $this->side = $side;
                break;
        }
    }

    /**
     * ...
     *
     * @return string
     */
    public function getSide(): string
    {
        return $this->side;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->hasKey();
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Renderer::view('panels/panel', ['panel' => $this]);
    }
}

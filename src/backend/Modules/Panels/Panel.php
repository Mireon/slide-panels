<?php

namespace Mireon\SlidePanels\Modules\Panels;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Modules\Panels\Exceptions\PanelSideIsInvalid;
use Mireon\SlidePanels\Properties\KeyProperty;
use Mireon\SlidePanels\Modules\Layers\Layers;
use Mireon\SlidePanels\Modules\Widgets\Header\HeaderProperty;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Methods\CreateMethod;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Panels
 */
class Panel implements Renderable
{
    use KeyProperty;
    use HeaderProperty;
    use CreateMethod;
    use RenderToString;

    /**
     * ...
     */
    public const SIDE_LEFT = 'left';

    /**
     * ...
     */
    public const SIDE_RIGHT = 'right';

    /**
     * ...
     *
     * @var Layers|null $layers
     */
    private ?Layers $layers = null;

    /**
     * ...
     *
     * @var string|null $side
     */
    private ?string $side = self::SIDE_LEFT;

    /**
     * Creates an instance of this class.
     *
     * @return static
     */
    public static function create(): self
    {
        return new static();
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
            case self::SIDE_LEFT:
            case self::SIDE_RIGHT:
                $this->side = $side;
                break;
            default:
                throw new PanelSideIsInvalid;
        }
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getSide(): ?string
    {
        return $this->side;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasSide(): bool
    {
        return !is_null($this->side);
    }

    /**
     * ...
     *
     * @param Layers $layers
     *   ...
     *
     * @return self
     */
    public function layers(Layers $layers): self
    {
        $this->setLayers($layers);

        return $this;
    }

    /**
     * ...
     *
     * @param Layers $layers
     *   ...
     *
     * @return void
     */
    public function setLayers(Layers $layers): void
    {
        $this->layers = $layers;
    }

    /**
     * ...
     *
     * @return Layers|null
     */
    public function getLayers(): ?Layers
    {
        return $this->layers;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasLayers(): bool
    {
        return !is_null($this->layers);
    }

    /**
     * ...
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->hasKey() && $this->hasSide();
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('panels/panel', ['panel' => $this]);
    }
}

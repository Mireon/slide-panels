<?php

namespace Mireon\SlidePanels\Modules\Layers;

use Exception;
use Mireon\SlidePanels\Methods\CreateMethod;
use Mireon\SlidePanels\Properties\KeyProperty;
use Mireon\SlidePanels\Modules\Widgets\Header\HeaderProperty;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;
use Mireon\SlidePanels\Target\TargetProperty;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Layers
 */
class Layer implements Renderable
{
    use KeyProperty;
    use HeaderProperty;
    use TargetProperty;
    use CreateMethod;
    use RenderString;

    /**
     * ...
     *
     * @var Back|null $back
     */
    private ?Back $back = null;

    /**
     * ...
     *
     * @param Back $back
     *   ...
     *
     * @return void
     */
    private function setBack(Back $back): void
    {
        $this->back = $back;
    }

    /**
     * ...
     *
     * @return Back|null
     */
    public function getBack(): ?Back
    {
        return $this->back;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasBack(): bool
    {
        return !is_null($this->back) && $this->back->isValid();
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
        return Render::view('layers/layer', ['layer' => $this]);
    }
}

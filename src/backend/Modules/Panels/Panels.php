<?php

namespace Mireon\SlidePanels\Modules\Panels;

use ArrayIterator;
use Exception;
use IteratorAggregate;
use Mireon\SlidePanels\Properties\Side;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;
use Traversable;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Panels
 */
class Panels implements Renderable, IteratorAggregate
{
    use RenderString;
    use Side;

    /**
     * ...
     *
     * @var Panel[] $panels
     */
    private array $panels = [];

    /**
     * ...
     *
     * @param Panel $panel
     *   ...
     *
     * @return void
     */
    public function addPanel(Panel $panel): void
    {
        if ($panel->isValid()) {
            $this->panels[] = $panel;
        }
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasPanels(): bool
    {
        return !empty($this->panels);
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Render::view('panels/panels', ['panels' => $this]);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->panels);
    }
}

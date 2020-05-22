<?php

namespace Mireon\SlidePanels\Components\Sides;

use Exception;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Components\Sides
 */
class Sides implements Renderable
{
    use RenderString;

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
     * @var SideLeft|null $left
     */
    private ?SideLeft $left = null;

    /**
     * ...
     *
     * @var SideRight|null $right
     */
    private ?SideRight $right = null;

    /**
     * ...
     *
     * @param SideLeft $side
     *   ...
     *
     * @return void
     */
    public function setLeft(SideLeft $side): void
    {
        $this->left = $side;
    }

    /**
     * ...
     *
     * @return SideLeft|null
     */
    public function getLeft(): ?SideLeft
    {
        return $this->left;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasLeft(): bool
    {
        return !is_null($this->left);
    }

    /**
     * ...
     *
     * @param SideRight $side
     *   ...
     *
     * @return void
     */
    public function setRight(SideRight $side): void
    {
        $this->right = $side;
    }

    /**
     * ...
     *
     * @return SideRight|null
     */
    public function getRight(): ?SideRight
    {
        return $this->right;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasRight(): bool
    {
        return !is_null($this->right);
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return Render::view('sides/sides', ['sides' => $this]);
    }
}

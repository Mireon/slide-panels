<?php

namespace Mireon\SlidePanels\Modules\Sides;

use Exception;
use Mireon\SlidePanels\Render\Renderable;
use Mireon\SlidePanels\Render\RenderString;
use Mireon\SlidePanels\Render\Render;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Sides
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
     * @return SideLeft
     */
    public function getLeft(): SideLeft
    {
        if (is_null($this->left)) {
            $this->setLeft(new SideLeft());
        }

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
     * @return SideRight
     */
    public function getRight(): SideRight
    {
        if (is_null($this->right)) {
            $this->setRight(new SideRight());
        }

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
     * ...
     *
     * @param string $side
     *   ...
     *
     * @return Side|null
     */
    public function getSide(string $side): ?Side
    {
        switch ($side) {
            case Sides::LEFT:
                return $this->getLeft();
            case Sides::RIGHT:
                return $this->getRight();
            default:
                return null;
        }
    }

    /**
     * ...
     *
     * @param string $side
     *   ...
     *
     * @return bool
     */
    public function hasSide(string $side): bool
    {
        switch ($side) {
            case Sides::LEFT:
                return $this->hasLeft();
            case Sides::RIGHT:
                return $this->hasRight();
            default:
                return false;
        }
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

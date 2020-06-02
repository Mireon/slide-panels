<?php

namespace Mireon\SlidePanels\Modules\Sides;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Modules\Sides\Exceptions\SideIsInvalid;
use Mireon\SlidePanels\Renderer\Renderable;
use Mireon\SlidePanels\Renderer\RenderToString;
use Mireon\SlidePanels\Renderer\Renderer;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Sides
 */
class Sides implements Renderable
{
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
     * @return Side
     */
    public function getSide(string $side): Side
    {
        switch ($side) {
            case Sides::LEFT:
                return $this->getLeft();
            case Sides::RIGHT:
                return $this->getRight();
            default:
                throw new SideIsInvalid;
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
                throw new SideIsInvalid;
        }
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('sides/sides', ['sides' => $this]);
    }
}

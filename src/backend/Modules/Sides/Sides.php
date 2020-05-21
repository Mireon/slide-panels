<?php

namespace Mireon\SlidePanels\Modules\Sides;

use Mireon\SlidePanels\Renders\Renderable;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Sides
 */
class Sides implements Renderable
{
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
     * @param string $side
     *   ...
     *
     * @return bool
     */
    public function hasSide(string $side = ''): bool
    {
        return $side
            ? !is_null($this->$side)
            : !is_null($this->left) || !is_null($this->right);
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        $result = '';

        if (!is_null($this->left)) {
            $result .= $this->left->render();
        }

        if (!is_null($this->right)) {
            $result .= $this->right->render();
        }

        return $result;
    }

    /**
     * ...
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}

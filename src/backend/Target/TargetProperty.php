<?php

namespace Mireon\SlidePanels\Target;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Target
 */
trait TargetProperty
{
    /**
     * ... 
     * 
     * @var Target|null $target
     */
    private ?Target $target = null;

    /**
     * ...
     *
     * @param Target $target
     *   ...
     *
     * @return self
     */
    public function target(Target $target): self
    {
        $this->setTarget($target);

        return $this;
    }

    /**
     * ...
     *
     * @param Target $target
     *   ...
     *
     * @return void
     */
    public function setTarget(Target $target): void
    {
        $this->target = $target;
    }

    /**
     * ...
     *
     * @return Target|null
     */
    public function getTarget(): ?Target
    {
        return $this->target;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasTarget(): bool
    {
        return !is_null($this->target);
    }
}

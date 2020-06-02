<?php

namespace Mireon\SlidePanels\Builder;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Builder
 */
interface BuilderEvent
{
    /**
     * ...
     *
     * @return bool
     */
    public function doBuild(): bool;

    /**
     * ...
     *
     * @param Builder $builder
     *   ...
     *
     * @return void
     */
    public function build(Builder $builder): void;
}

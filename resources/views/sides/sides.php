<?php

use Mireon\SlidePanels\Components\Sides\Sides;

/**
 * ...
 *
 * @var Sides $sides
 *   ...
 */
?>

<div class="slide-panels__sides">
    <?= $sides->hasLeft() ? $sides->getLeft() : ''; ?>
    <?= $sides->hasRight() ? $sides->getRight() : ''; ?>
</div>

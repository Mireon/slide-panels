<?php

use Mireon\SlidePanels\Components\Sides\Side;

/**
 * ...
 *
 * @var Side $side
 *   ...
 */
?>

<div class="slide-panels__side slide-panels__side-<?= $side->getSide(); ?> slide-panels__side_hidden slide-panels__side-<?= $side->getSide(); ?>_outside" data-element="side" data-side="<?= $side->getSide(); ?>">
    <?= $side->hasCollapser() ? $side->getCollapser() : ''; ?>
    <?= $side->hasPanels() ? $side->getPanels() : ''; ?>
</div>

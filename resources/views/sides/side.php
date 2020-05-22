<?php

use Mireon\SlidePanels\Components\Sides\Side;

/**
 * ...
 *
 * @var Side $side
 *   ...
 */
?>

<div data-element="side" data-side="<?= $side->getSide(); ?>" class="slide-panels__side slide-panels__side-<?= $side->getSide(); ?> slide-panels__side_hidden slide-panels__side-<?= $side->getSide(); ?>_outside">
    <?= $side->hasCollapser() ? $side->getCollapser() : ''; ?>
    <?= $side->hasPanels() ? $side->getPanels() : ''; ?>
</div>

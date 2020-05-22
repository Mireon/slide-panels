<?php

use Mireon\SlidePanels\Components\Layers\Layer;

/**
 * ...
 *
 * @var Layer $layer
 *   ...
 */
?>

<div data-element="layer" data-key="<?= $layer->getKey(); ?>" class="slide-panels__layer slide-panels_layer-<?= $layer->getKey(); ?> slide-panels__layer_hidden">
    <?= $layer->hasHeader() ? $layer->getHeader() : ''; ?>
    <?= $layer->hasBack() ? $layer->getBack() : ''; ?>
    ...
</div>

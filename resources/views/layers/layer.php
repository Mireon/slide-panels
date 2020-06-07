<?php

use Mireon\SlidePanels\Modules\Layers\Layer;
use Mireon\SlidePanels\Modules\Widgets\WidgetInterface;

/**
 * ...
 *
 * @var Layer $layer
 *   ...
 * @var WidgetInterface $widget
 *   ...
 */
?>

<div class="slide-panels__layer slide-panels_layer-<?= $layer->getKey(); ?> slide-panels__layer_hidden" data-element="layer" data-key="<?= $layer->getKey(); ?>">
    <?= $layer->hasHeader() ? $layer->getHeader() : ''; ?>
    <?= $layer->hasBack() ? $layer->getBack() : ''; ?>
    <?php if ($layer->hasWidgets()): ?>
        <?php foreach ($layer->getWidgets() as $widget): ?>
            <?= $widget->render(); ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

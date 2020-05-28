<?php

use Mireon\SlidePanels\Modules\Layers\Layer;
use Mireon\SlidePanels\Modules\Layers\Layers;

/**
 * ...
 *
 * @var Layers $layers
 *   ...
 * @var Layer $layer
 *   ...
 */
?>

<div class="slide-panels__layers">
    <?php foreach ($layers as $layer): ?>
        <?= $layer; ?>
    <?php endforeach; ?>
</div>

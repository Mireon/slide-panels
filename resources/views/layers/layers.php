<?php

use Mireon\SlidePanels\Components\Layers\Layer;
use Mireon\SlidePanels\Components\Layers\Layers;

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

<?php

use Mireon\SlidePanels\Modules\Panels\Panel;
use Mireon\SlidePanels\Modules\Panels\Panels;

/**
 * ...
 *
 * @var Panels $panels
 *   ...
 * @var Panel $panel
 *   ...
 */
?>

<div class="slide-panels__panels">
    <?php foreach ($panels as $panel): ?>
        <?= $panel; ?>
    <?php endforeach; ?>
</div>

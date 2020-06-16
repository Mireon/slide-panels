<?php

use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\Panels;

/**
 * Prints a panel container.
 *
 * @var Panels $panels
 *   A panel container.
 * @var Panel $panel
 *   A panel.
 */
?>

<div class="slide-panels__panels">
    <?php foreach ($panels as $panel): ?>
        <?= $panel; ?>
    <?php endforeach; ?>
</div>

<?php

use Mireon\SlidePanels\Panels\PanelInterface;
use Mireon\SlidePanels\Panels\PanelsInterface;

/**
 * Prints the panels container.
 *
 * @var PanelInterface $panels
 *   The panels container.
 * @var PanelsInterface $panel
 *   A panel.
 */
?>

<div class="slide-panels__panels">
    <?php foreach ($panels as $panel): ?>
        <?= $panel->render(); ?>
    <?php endforeach; ?>
</div>

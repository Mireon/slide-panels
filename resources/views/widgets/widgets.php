<?php

use Mireon\SlidePanels\Widgets\WidgetInterface;
use Mireon\SlidePanels\Widgets\Widgets;

/**
 * Prints the widgets container.
 *
 * @var Widgets $widgets
 *   A widgets container.
 * @var WidgetInterface $widget
 *   A widget.
 */
?>

<div class="slide-panels__widgets">
    <?php foreach ($widgets as $widget): ?>
        <?= $widget->render(); ?>
    <?php endforeach; ?>
</div>

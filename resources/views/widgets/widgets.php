<?php

use Mireon\SlidePanels\Widgets\WidgetInterface;
use Mireon\SlidePanels\Widgets\Widgets;

/**
 * Prints a widget container.
 *
 * @var Widgets $widgets
 *   A widget container.
 * @var WidgetInterface $widget
 *   A widget.
 */
?>

<?php foreach ($widgets as $widget): ?>
    <?= $widget->render(); ?>
<?php endforeach; ?>

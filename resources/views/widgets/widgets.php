<?php

use Mireon\SlidePanels\Widgets\WidgetInterface;
use Mireon\SlidePanels\Widgets\Widgets;

/**
 * ...
 *
 * @var Widgets $widgets
 *   ...
 * @var WidgetInterface $widget
 *   ...
 */
?>

<?php foreach ($widgets as $widget): ?>
    <?= $widget->render(); ?>
<?php endforeach; ?>

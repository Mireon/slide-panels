<?php

use Mireon\SlidePanels\Modules\Widgets\WidgetInterface;
use Mireon\SlidePanels\Modules\Widgets\Widgets;

/**
 * ...
 *
 * @var Widgets $widgets
 *   ...
 * @var WidgetInterface $widget
 *   ...
 */
?>

<?php foreach ($widgets->getWidgets() as $widget): ?>
    <?= $widget->render(); ?>
<?php endforeach; ?>

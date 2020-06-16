<?php

use Mireon\SlidePanels\Panels\Panel;

/**
 * Prints a panel.
 *
 * @var Panel $panel
 *   A pane.
 */
?>

<?= $panel->hasStyles() && $panel->getStyles()->doUse() ? $panel->getStyles() : ''; ?>
<div class="slide-panels__panel slide-panels__panel-<?= $panel->getKey(); ?> slide-panels__panel_hidden slide-panels__panel-<?= $panel->getSide(); ?>_outside" data-element="panel" data-key="<?= $panel->getKey(); ?>" data-side="<?= $panel->getSide(); ?>">
    <?= $panel->hasWidgets() ? $panel->getWidgets() : ''; ?>
</div>

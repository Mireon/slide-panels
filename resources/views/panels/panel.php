<?php

use Mireon\SlidePanels\Panels\Panel;

/**
 * ...
 *
 * @var Panel $panel
 *   ...
 */
?>

<div class="slide-panels__panel slide-panels__panel-<?= $panel->getKey(); ?> slide-panels__panel_hidden" data-element="panel" data-key="<?= $panel->getKey(); ?>" data-side="<?= $panel->getSide(); ?>">
    <?= $panel->hasWidgets() ? $panel->getWidgets() : ''; ?>
</div>

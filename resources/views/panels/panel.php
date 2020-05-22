<?php

use Mireon\SlidePanels\Components\Panels\Panel;

/**
 * ...
 *
 * @var Panel $panel
 *   ...
 */
?>

<div data-element="panel" data-key="<?= $panel->getKey(); ?>" data-side="<?= $panel->getSide(); ?>" class="slide-panels__panel slide-panels__panel-<?= $panel->getKey(); ?> slide-panels__panel_hidden">
    <?= $panel->hasHeader() ? $panel->getHeader() : ''; ?>
    <?= $panel->hasLayers() ? $panel->getLayers() : ''; ?>
</div>

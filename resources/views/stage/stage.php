<?php

use Mireon\SlidePanels\Components\Stage\Stage;

/**
 * ...
 *
 * @var Stage $stage
 *   ...
 */
?>

<div id="slide-panels" class="slide-panels slide-panels__stage slide-panels__stage_hidden">
    <div data-element="backstage" class="slide-panels__backstage slide-panels__backstage_hidden"></div>
    <div data-element="lever" data-action="hide" class="slide-panels__close-empty-space"></div>
    <?= $stage->hasSides() ? $stage->getSides() : ''; ?>
</div>

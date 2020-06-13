<?php

use Mireon\SlidePanels\Levers\Lever;

/**
 * ...
 *
 * @var Lever $lever
 *   ...
 */
?>

<a href="#" class="slide-panels__lever slide-panels__lever-hide" data-element="lever" data-action="hide">
    <?= $lever->hasText() ? $lever->getText() : ''; ?>
</a>

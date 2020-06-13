<?php

use Mireon\SlidePanels\Levers\Lever;

/**
 * ...
 *
 * @var Lever $lever
 *   ...
 */
?>

<a href="#" class="slide-panels__lever slide-panels__lever-show" data-element="lever" data-action="show" data-target="<?= $lever->getPanel(); ?>">
    <?= $lever->getText(); ?>
</a>

<?php

use Mireon\SlidePanels\Modules\Levers\Lever;

/**
 * ...
 *
 * @var Lever $lever
 *   ...
 */
?>

<a href="#" class="slide-panels__lever" data-element="lever" data-action="show" data-target="<?= $lever->getPanel(); ?>">
    <?= $lever->getText(); ?>
</a>

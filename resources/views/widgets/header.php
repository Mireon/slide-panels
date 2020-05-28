<?php

use Mireon\SlidePanels\Modules\Widgets\Header\Header;

/**
 * ...
 *
 * @var Header $header
 *   ...
 */
?>

<div class="slide-panels__header slide-panels__header_<?= $header->getSize(); ?>">
    <div class="slide-panels__header__text slide-panels__header__text_<?= $header->getSize(); ?>">
        <?= $header->getText(); ?>
    </div>
</div>

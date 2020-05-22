<?php

use Mireon\SlidePanels\Components\Widgets\Header\Header;

/**
 * ...
 *
 * @var Header $header
 *   ...
 */
?>

<div class="header header_<?= $header->getSize(); ?>">
    <div class="header__text header__text_<?= $header->getSize(); ?>">
        <?= $header->getText(); ?>
    </div>
</div>

<?php

use Mireon\SlidePanels\Widgets\Header\Header;

/**
 * Prints the header widget.
 *
 * @var Header $header
 *   A header widget.
 */

$specialClass = $header->hasKey() ? "slide-panels__header-{$header->getKey()}" : '';
?>

<div class="slide-panels__header slide-panels__header_<?= $header->getSize(); ?> <?= $specialClass; ?>">
    <?php if ($header->hasIcon()): ?>
        <i class="slide-panels__header__icon slide-panels__header__icon_<?= $header->getSize(); ?> <?= $header->getIcon(); ?>"></i>
    <?php endif; ?>
    <div class="slide-panels__header__text slide-panels__header__text_<?= $header->getSize(); ?>">
        <?= $header->getText(); ?>
    </div>
</div>

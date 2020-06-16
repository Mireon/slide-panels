<?php

use Mireon\SlidePanels\Widgets\Close\Close;

/**
 * Prints a lever to hide a panel.
 *
 * @var Close $close
 *   A close widget.
 */
?>

<a href="#" class="slide-panels__close-label" data-element="lever" data-action="hide">
    <?php if ($close->hasIcon()): ?>
        <i class="slide-panels__close-label__icon <?= $close->getIcon(); ?>"></i>
    <?php endif; ?>
    <?php if ($close->hasText()): ?>
        <span class="slide-panels__close-label__text"><?= $close->hasText() ? $close->getText() : ''; ?></span>
    <?php endif; ?>
</a>

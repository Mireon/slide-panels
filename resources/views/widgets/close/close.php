<?php

use Mireon\SlidePanels\Widgets\Close\Close;

/**
 * Prints the close widget.
 *
 * @var Close $close
 *   A close widget.
 */
?>

<a href="#" class="slide-panels__close" data-element="lever" data-action="hide">
    <?php if ($close->hasIcon()): ?>
        <i class="slide-panels__close__icon <?= $close->getIcon(); ?>"></i>
    <?php endif; ?>
    <?php if ($close->hasText()): ?>
        <span class="slide-panels__close__text"><?= $close->hasText() ? $close->getText() : ''; ?></span>
    <?php endif; ?>
</a>

<?php

use Mireon\SlidePanels\Widgets\Menu\Item;

/**
 * Prints a menu item.
 *
 * @var Item $item
 *   A menu item.
 */
?>

<a href="<?= $item->getUrl(); ?>" class="slide-panels__menu__link">
    <?php if ($item->hasIcon()): ?>
        <i class="slide-panels__menu__icon <?= $item->getIcon(); ?>"></i>
    <?php endif; ?>
    <span class="slide-panels__menu__text"><?= $item->getText(); ?></span>
</a>

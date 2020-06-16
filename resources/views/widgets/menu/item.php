<?php

use Mireon\SlidePanels\Widgets\Menu\Item;

/**
 * Prints a menu item.
 *
 * @var Item $item
 *   A menu item.
 */
?>

<?php if ($item->hasIcon()): ?>
    <i class="slide-panels__menu__icon <?= $item->getIcon(); ?>"></i>
<?php endif; ?>
<a href="<?= $item->getUrl(); ?>" class="slide-panels__menu__link"><?= $item->getText(); ?></a>

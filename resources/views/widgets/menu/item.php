<?php

use Mireon\SlidePanels\Modules\Widgets\Menu\Item;

/**
 * ...
 *
 * @var Item $item
 *   ...
 */
?>

<?php if ($item->hasIcon()): ?>
    <i class="slide-panels__menu__icon <?= $item->getIcon(); ?>"></i>
<?php endif; ?>
<a href="<?= $item->getUrl(); ?>" class="slide-panels__menu__link"><?= $item->getText(); ?></a>

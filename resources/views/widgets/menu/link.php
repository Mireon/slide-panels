<?php

use Mireon\SlidePanels\Modules\Widgets\Menu\Link;

/**
 * ...
 *
 * @var Link $link
 *   ...
 */
?>

<?php if ($link->hasIcon()): ?>
    <i class="slide-panels__menu__icon <?= $link->getIcon(); ?>"></i>
<?php endif; ?>
<a href="<?= $link->getUrl(); ?>" class="slide-panels__menu__link"><?= $link->getText(); ?></a>

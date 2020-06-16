<?php

use Mireon\SlidePanels\Widgets\Menu\ItemInterface;
use Mireon\SlidePanels\Widgets\Menu\Menu;

/**
 * ...
 *
 * @var Menu $menu
 *   ...
 * @var ItemInterface $item
 *   ...
 */
?>

<div class="slide-panels__menu">
    <?php if ($menu->hasItems()): ?>
        <ul class="slide-panels__menu__list">
            <?php foreach ($menu as $item): ?>
                <li class="slide-panels__menu__item">
                    <?= $item->render(); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

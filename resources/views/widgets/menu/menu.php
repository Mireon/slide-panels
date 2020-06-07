<?php

use Mireon\SlidePanels\Modules\Widgets\Menu\Item;
use Mireon\SlidePanels\Modules\Widgets\Menu\Menu;

/**
 * ...
 *
 * @var Menu $menu
 *   ...
 * @var Item $item
 *   ...
 */
?>

<div class="slide-panels__menu">
    <?= $menu->hasHeader() ? $menu->getHeader() : ''; ?>
    <?php if ($menu->hasItems()): ?>
        <ul class="slide-panels__menu__list">
            <?php foreach ($menu->getItems() as $item): ?>
                <li class="slide-panels__menu__item">
                    <?= $item; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

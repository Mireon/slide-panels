<?php
/**
 * ...
 *
 * @var \Mireon\SlidePanels\Modules\Sides\Side $side
 *   ...
 */
?>
<div data-element="side" data-side="<?= $side->getSide(); ?>" class="slide-panels__side slide-panels__side_hidden slide-panels__side-<?= $side->getSide(); ?>_outside">
    <?php if ($side->hasCloseButton()): ?>
        <div data-element="lever" data-action="hide" class="slide-panels__close-label slide-panels__close-label_<?= $side->getSide(); ?> slide-panels__close-label_hidden"><i></i></div>
    <?php endif; ?>
    <?= $side->hasPanels() ? $side->getPanels() : ''; ?>
</div>

<?php

use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\PanelStyles;

/**
 * Prints styles.
 *
 * @var Panel $panel
 *   A panel.
 * @var PanelStyles $styles
 *   A panel styles.
 */

$width = "{$styles->getWidth()}px";
$classMain = ".slide-panels__panel-{$panel->getKey()}";
$classOutside = "$classMain.slide-panels__panel-{$panel->getSide()}_outside";
$classSlideInside = "$classMain.slide-panels__panel-{$panel->getSide()}_slide-inside";
$classSlideOutside = "$classMain.slide-panels__panel-{$panel->getSide()}_slide-outside";
$keyframesSlideInside = "slide-panels__panel-{$panel->getKey()}_slide-inside";
$keyframesSlideOutside = "slide-panels__panel-{$panel->getKey()}_slide-outside";
?>

<style type="text/css">
    @keyframes <?= $keyframesSlideInside; ?> {
        from { <?= $panel->getSide(); ?>: -<?= $width; ?>; }
        to { <?= $panel->getSide(); ?>: 0; }
    }

    @keyframes <?= $keyframesSlideOutside; ?> {
        from { <?= $panel->getSide(); ?>: 0; }
        to { <?= $panel->getSide(); ?>: -<?= $width; ?>; }
    }

    <?= $classMain; ?> {
        width: <?= $width; ?>;
    }

    <?= $classOutside; ?> {
        <?= $panel->getSide(); ?>: -<?= $width; ?>;
    }

    <?= $classSlideInside; ?> {
        animation-name: slide-panels__panel-<?= $panel->getKey(); ?>_slide-inside;
        -webkit-animation-name: slide-panels__panel-<?= $panel->getKey(); ?>_slide-inside;
    }

    <?= $classSlideOutside; ?> {
        animation-name: slide-panels__panel-<?= $panel->getKey(); ?>_slide-outside;
        -webkit-animation-name: slide-panels__panel-<?= $panel->getKey(); ?>_slide-outside;
    }

    @media screen and (max-width: <?= $width; ?>) {
        <?= $classMain; ?> {
            width: 100%;
        }

        <?= $classOutside; ?> {
            <?= $panel->getSide(); ?>: -100vw;
        }

        @keyframes <?= $keyframesSlideInside; ?> {
            from { <?= $panel->getSide(); ?>: -100vw; }
            to { <?= $panel->getSide(); ?>: 0; }
        }

        @keyframes <?= $keyframesSlideOutside; ?> {
            from { <?= $panel->getSide(); ?>: 0; }
            to { <?= $panel->getSide(); ?>: -100vw; }
        }
    }
</style>

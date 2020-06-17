<?php

use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\PanelStyles;

/**
 * Prints styles for a panel.
 *
 * @var Panel $panel
 *   A panel.
 * @var PanelStyles $styles
 *   A panel styles.
 */

$panelWidth = "{$styles->getWidth()}px";
$screenWidth = $styles->getWidth() + 30 . 'px';
$currentPanel = "slide-panels__panel-{$panel->getKey()}";
$outside = ".$currentPanel.slide-panels__panel_{$panel->getSide()}_outside";
$slideInside = ".$currentPanel.slide-panels__panel_{$panel->getSide()}_slide-inside";
$slideOutside = ".$currentPanel.slide-panels__panel_{$panel->getSide()}_slide-outside";
$animationSlideInside = "{$currentPanel}_slide-inside";
$animationSlideOutside = "{$currentPanel}_slide-outside";
?>

<style type="text/css">
    @keyframes <?= $animationSlideInside; ?> {
        from { <?= $panel->getSide(); ?>: -<?= $panelWidth; ?>; }
        to { <?= $panel->getSide(); ?>: 0; }
    }

    @keyframes <?= $animationSlideOutside; ?> {
        from { <?= $panel->getSide(); ?>: 0; }
        to { <?= $panel->getSide(); ?>: -<?= $panelWidth; ?>; }
    }

    .<?= $currentPanel; ?> {
        width: <?= $panelWidth; ?>;
    }

    <?= $outside; ?> {
        <?= $panel->getSide(); ?>: -<?= $panelWidth; ?>;
    }

    <?= $slideInside; ?> {
        animation-name: slide-panels__panel-<?= $panel->getKey(); ?>_slide-inside;
        -webkit-animation-name: slide-panels__panel-<?= $panel->getKey(); ?>_slide-inside;
    }

    <?= $slideOutside; ?> {
        animation-name: slide-panels__panel-<?= $panel->getKey(); ?>_slide-outside;
        -webkit-animation-name: slide-panels__panel-<?= $panel->getKey(); ?>_slide-outside;
    }

    @media screen and (max-width: <?= $screenWidth; ?>) {
        @keyframes <?= $animationSlideInside; ?> {
            from { <?= $panel->getSide(); ?>: -100vw; }
            to { <?= $panel->getSide(); ?>: 0; }
        }

        @keyframes <?= $animationSlideOutside; ?> {
            from { <?= $panel->getSide(); ?>: 0; }
            to { <?= $panel->getSide(); ?>: -100vw; }
        }

        .<?= $currentPanel; ?> {
            width: calc(100% - 30px);
        }

        <?= $outside; ?> {
            <?= $panel->getSide(); ?>: -100vw;
        }
    }
</style>

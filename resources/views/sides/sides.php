<?php

use Mireon\SlidePanels\Components\Sides\Sides;

/**
 * ...
 *
 * @var Sides $sides
 *   ...
 */
?>

<?= $sides->hasLeft() ? $sides->getLeft() : ''; ?>
<?= $sides->hasRight() ? $sides->getRight() : ''; ?>

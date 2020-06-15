<?php

use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\Panels;

/**
 * ...
 *
 * @var Panels $panels
 *   ...
 * @var Panel $panel
 *   ...
 */
?>

<?php if ($panels->hasPanels()): ?>
    <div class="slide-panels__panels">
        <?php foreach ($panels as $panel): ?>
            <?= $panel; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php

namespace Mireon\SlidePanels\View;

use function Composer\Autoload\includeFile;

/**
 * ...
 *
 * @package Mireon\SlidePanels\View
 */
class View
{
    /**
     * ...
     *
     * @param string $view
     *   ...
     * @param array $params
     *   ...
     *
     * @return string
     */
    public static function view(string $view, array $params = []): string
    {
        ob_start();
        extract($params);
        include __DIR__ . "/../../../resources/views/$view.php";

        return ob_get_clean() ?: '';
    }
}

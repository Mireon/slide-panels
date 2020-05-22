<?php

namespace Mireon\SlidePanels\Render;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Render
 */
class Render
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
     *
     * @throws Exception
     */
    public static function view(string $view, array $params = []): string
    {
        $path =  __DIR__ . "/../../../resources/views/$view.php";

        if (!file_exists($path)) {
            throw new Exception(sprintf('File "%s" could not be found.', $path));
        }

        ob_start();
        extract($params);

        include $path;

        return ob_get_clean() ?: '';
    }
}

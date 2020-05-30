<?php

namespace Mireon\SlidePanels\Render;

use Exception;
use Mireon\SlidePanels\Helpers\Path;

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
        $path = Path::views($view);

        if (!file_exists($path)) {
            throw new Exception(sprintf('File "%s" could not be found.', $path));
        }

        ob_start();
        extract($params);

        require $path;

        return ob_get_clean() ?: '';
    }
}

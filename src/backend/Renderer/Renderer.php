<?php

namespace Mireon\SlidePanels\Renderer;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Helpers\Path;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Renderer
 */
class Renderer
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
     * @throws FileNotFound
     */
    public static function view(string $view, array $params = []): string
    {
        $path = Path::views($view);

        if (!file_exists($path)) {
            throw new FileNotFound($path);
        }

        ob_start();
        extract($params);

        require $path;
        return ob_get_clean() ?: '';
    }
}

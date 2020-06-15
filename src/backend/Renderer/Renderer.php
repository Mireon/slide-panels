<?php

namespace Mireon\SlidePanels\Renderer;

use Exception;
use Mireon\SlidePanels\Helpers\Path;

/**
 * The default renderer.
 *
 * @package Mireon\SlidePanels\Renderer
 */
class Renderer
{
    /**
     * Renders a view.
     *
     * @param string $view
     *   A view name.
     * @param array $params
     *   An array of params.
     *
     * @return string
     *
     * @throws Exception
     */
    public static function view(string $view, array $params = []): string
    {
        $path = Path::views($view);

        if (!file_exists($path)) {
            throw new Exception("File \"$path\" not found.");
        }

        ob_start();
        extract($params);

        require $path;
        return ob_get_clean() ?: '';
    }
}

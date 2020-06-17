<?php

namespace Mireon\SlidePanels\Renderer;

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
     */
    public static function render(string $view, array $params = []): string
    {
        ob_start();
        extract($params);

        require Path::views($view);
        return ob_get_clean() ?: '';
    }
}

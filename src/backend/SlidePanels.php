<?php

namespace Mireon\SlidePanels;

/**
 * ...
 *
 * @package Mireon\SlidePanels
 */
class SlidePanels
{
    /**
     * ...
     */
    public const ASSETS_PATH = '/vendor/mireon/slide-panels';

    /**
     * ...
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . static::ASSETS_PATH;
    }

    /**
     * ...
     *
     * @return string
     */
    public function getStyles(): string
    {
        return '<link rel="stylesheet" href="' . $this->getBaseUrl() . '/styles/slide-panels.min.css" type="text/css" />';
    }

    /**
     * ...
     *
     * @return void
     */
    public function getHtml(): void
    {
        include __DIR__ . '/../../resources/views/stage.php';
    }

    /**
     * ...
     *
     * @return string
     */
    public function getScripts(): string
    {
        return '<script src="' . $this->getBaseUrl() . '/scripts/slide-panels.js"></script>';
    }
}

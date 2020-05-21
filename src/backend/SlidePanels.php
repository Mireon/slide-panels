<?php

namespace Mireon\SlidePanels;

use Mireon\SlidePanels\Modules\Panels\Panels;
use Mireon\SlidePanels\Modules\Sides\SideLeft;
use Mireon\SlidePanels\Modules\Sides\SideRight;
use Mireon\SlidePanels\Modules\Sides\Sides;
use Mireon\SlidePanels\Modules\Stage\Stage;

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
     * @return string
     */
    public function getHtml(): string
    {
        $panels = new Panels();

        $sideLeft = new SideLeft();
        $sideLeft->setCloseButton();
        $sideLeft->setPanels($panels);

        $sideRight = new SideRight();
        $sideRight->setCloseButton();
        $sideRight->setPanels($panels);

        $sides = new Sides();
        $sides->setLeft($sideLeft);
        $sides->setRight($sideRight);

        $stage = new Stage();
        $stage->setSides($sides);

        return $stage->render();
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

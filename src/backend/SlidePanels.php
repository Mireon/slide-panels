<?php

namespace Mireon\SlidePanels;

use Mireon\SlidePanels\Modules\Layers\Layer;
use Mireon\SlidePanels\Modules\Layers\Layers;
use Mireon\SlidePanels\Modules\Panels\Panel;
use Mireon\SlidePanels\Modules\Panels\Panels;
use Mireon\SlidePanels\Modules\Sides\Collapser;
use Mireon\SlidePanels\Modules\Sides\SideLeft;
use Mireon\SlidePanels\Modules\Sides\SideRight;
use Mireon\SlidePanels\Modules\Sides\Sides;
use Mireon\SlidePanels\Modules\Stage\Stage;
use Mireon\SlidePanels\Modules\Widgets\Header\Header;

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
        $data = [
            'sides' => [
                'left' => [
                    'collapser' => true,
                    'panels' => [
                        'side' => 'left',
                        'panels' => [

                        ],
                    ],
                ],
                'right' => [
                    'collapser' => true,
                    'panels' => [
                        'side' => 'right',
                        'panels' => [
                            [
                                'key' => 'panel-1',
                                'side' => 'right',
                                'header' => [
                                    'size' => 'big',
                                    'icon' => 'fa fa-bar',
                                    'text' => 'Panel #1',
                                ],
                                'layers' => [
                                    [
                                        'key' => 'layer-1',
                                        'header' => [
                                            'size' => 'small',
                                            'icon' => 'fa fa-stop',
                                            'text' => 'Layer #1',
                                        ],
                                        'layers' => [
                                            [
                                                'key' => 'layer-1-1',
                                                'header' => [
                                                    'size' => 'small',
                                                    'icon' => 'fa fa-stop',
                                                    'text' => 'Layer #1.2',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $headerForLayer1 = new Header();
        $headerForLayer1->setSize(Header::SIZE_SMALL);
        $headerForLayer1->setText('Layer #1');

        $layer1 = new Layer();
        $layer1->setKey('layer-1');
        $layer1->setHeader($headerForLayer1);

        $headerForLayer2 = new Header();
        $headerForLayer2->setSize(Header::SIZE_SMALL);
        $headerForLayer2->setText('Layer #2');

        $layer2 = new Layer();
        $layer2->setKey('layer-2');
        $layer2->setHeader($headerForLayer2);

        $layers = new Layers();
        $layers->addLayer($layer1);
        $layers->addLayer($layer2);

        // -------- LEFT -----------

        $headerForPanelLeft1 = new Header();
        $headerForPanelLeft1->setSize(Header::SIZE_BIG);
        $headerForPanelLeft1->setText('Panel left #1');

        $panelLeft1 = new Panel();
        $panelLeft1->setKey('panel-left-1');
        $panelLeft1->setSide(Sides::LEFT);
        $panelLeft1->setHeader($headerForPanelLeft1);
        $panelLeft1->setLayers($layers);

        $headerForPanelLeft2 = new Header();
        $headerForPanelLeft2->setSize(Header::SIZE_BIG);
        $headerForPanelLeft2->setText('Panel left #2');

        $panelLeft2 = new Panel();
        $panelLeft2->setKey('panel-left-2');
        $panelLeft2->setSide(Sides::LEFT);
        $panelLeft2->setHeader($headerForPanelLeft2);
        $panelLeft2->setLayers($layers);

        $panelsLeft = new Panels();
        $panelsLeft->setSide(Sides::LEFT);
        $panelsLeft->addPanel($panelLeft1);
        $panelsLeft->addPanel($panelLeft2);

        $collapserLeft = new Collapser();
        $collapserLeft->setSide(Sides::LEFT);

        $sideLeft = new SideLeft();
        $sideLeft->setCollapser($collapserLeft);
        $sideLeft->setPanels($panelsLeft);

        // -------- RIGHT -----------

        $headerForPanelRight1 = new Header();
        $headerForPanelRight1->setSize(Header::SIZE_BIG);
        $headerForPanelRight1->setText('Panel right #1');

        $panelRight1 = new Panel();
        $panelRight1->setKey('panel-right-1');
        $panelRight1->setSide(Sides::RIGHT);
        $panelRight1->setHeader($headerForPanelRight1);
        $panelRight1->setLayers($layers);

        $headerForPanelRight2 = new Header();
        $headerForPanelRight2->setSize(Header::SIZE_BIG);
        $headerForPanelRight2->setText('Panel right #2');

        $panelRight2 = new Panel();
        $panelRight2->setKey('panel-right-2');
        $panelRight2->setSide(Sides::RIGHT);
        $panelRight2->setHeader($headerForPanelRight2);
        $panelRight2->setLayers($layers);

        $panelsRight = new Panels();
        $panelsRight->setSide(Sides::RIGHT);
        $panelsRight->addPanel($panelRight1);
        $panelsRight->addPanel($panelRight2);

        $collapserRight = new Collapser();
        $collapserRight->setSide(Sides::RIGHT);

        $sideRight = new SideRight();
        $sideRight->setCollapser($collapserRight);
        $sideRight->setPanels($panelsRight);

        // -------- SINGLETON'S -----------

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

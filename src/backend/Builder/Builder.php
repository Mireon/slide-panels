<?php

namespace Mireon\SlidePanels\Builder;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Modules\Panels\Panel;
use Mireon\SlidePanels\Modules\Panels\Panels;
use Mireon\SlidePanels\Modules\Stage\Stage;
use Mireon\SlidePanels\Modules\Widgets\WidgetInterface;
use Mireon\SlidePanels\Modules\Widgets\WidgetInvalid;
use Mireon\SlidePanels\Renderer\Renderable;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Builder
 */
class Builder implements Renderable
{
    /**
     * ...
     *
     * @var Stage|null
     */
    private ?Stage $stage = null;

    /**
     * ...
     *
     * @return Stage
     */
    private function getStage(): Stage
    {
        if (is_null($this->stage)) {
            $this->stage = new Stage();
        }

        return $this->stage;
    }

    /**
     * ...
     *
     * @return Panels
     */
    private function getPanels(): Panels
    {
        $stage = $this->getStage();

        if (!$stage->hasPanels()) {
            $stage->setPanels(new Panels());
        }

        return $stage->getPanels();
    }

    /**
     * ...
     *
     * @param string $key
     *   ...
     *
     * @return Panel
     *
     * @throws PanelKeyUndefined
     */
    private function getPanel(string $key): Panel
    {
        if (empty($key)) {
            throw new PanelKeyUndefined();
        }

        $panels = $this->getPanels();

        if (!$panels->hasPanel($key)) {
            $panel = new Panel();
            $panel->setKey($key);

            $panels->addPanel($panel);
        }

        return $panels->getPanel($key);
    }

    /**
     * ...
     *
     * @param Panel $panel
     *   ...
     *
     * @return self
     */
    public function panel(Panel $panel): self
    {
        $this->getPanels()->addPanel($panel);

        return $this;
    }

    /**
     * ...
     *
     * @param WidgetInterface $widget
     *   ...
     *
     * @return self
     *
     * @throws PanelKeyUndefined
     * @throws WidgetInvalid
     */
    public function widget(WidgetInterface $widget): self
    {
        $this->getPanel($widget->getLocation()->getPanel())->addWidget($widget);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return $this->stage->render();
    }
}

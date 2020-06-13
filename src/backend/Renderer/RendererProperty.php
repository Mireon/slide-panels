<?php

namespace Mireon\SlidePanels\Renderer;

use Exception;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Renderer
 */
trait RendererProperty
{
    /**
     * ...
     *
     * @var RendererInterface|null
     */
    private ?RendererInterface $renderer = null;

    /**
     * ...
     *
     * @param RendererInterface $renderer
     *   ...
     *
     * @return self
     */
    public function renderer(RendererInterface $renderer): self
    {
        $this->setRenderer($renderer);

        return $this;
    }

    /**
     * ...
     *
     * @param RendererInterface $renderer
     *   ...
     *
     * @return void
     */
    public function setRenderer(RendererInterface $renderer): void
    {
        $this->renderer = $renderer;
    }

    /**
     * ...
     *
     * @return RendererInterface
     */
    public function getRenderer(): RendererInterface
    {
        return $this->renderer;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasRenderer(): bool
    {
        return !is_null($this->renderer);
    }

    /**
     * ...
     *
     * @return string
     *
     * @throws Exception
     */
    public function render(): string
    {
        if (!$this->hasRenderer()) {
            throw new Exception('Renderer is undefined.');
        }

        return $this->getRenderer()->render($this);
    }
}

<?php

namespace Mireon\SlidePanels\Widgets\Header;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Widgets\Header
 */
trait HeaderProperty
{
    /**
     * ...
     *
     * @var Header|null
     */
    private ?Header $header = null;

    /**
     * ...
     *
     * @param Header $header
     *   ...
     *
     * @return self
     */
    public function header(Header $header): self
    {
        $this->setHeader($header);

        return $this;
    }

    /**
     * ...
     *
     * @param Header $header
     *   ...
     *
     * @return void
     */
    public function setHeader(Header $header): void
    {
        $this->header = $header;
    }

    /**
     * ...
     *
     * @return Header|null
     */
    public function getHeader(): ?Header
    {
        return $this->header;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasHeader(): bool
    {
        return !is_null($this->header);
    }
}

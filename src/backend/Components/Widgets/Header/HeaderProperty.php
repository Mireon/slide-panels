<?php

namespace Mireon\SlidePanels\Components\Widgets\Header;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Components\Widgets\Header
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

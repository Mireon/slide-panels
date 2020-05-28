<?php

namespace Mireon\SlidePanels\Modules\Widgets\Header;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets\Header
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

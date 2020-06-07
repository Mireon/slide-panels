<?php

namespace Mireon\SlidePanels\Properties;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Properties
 */
trait UrlProperty
{
    /**
     * ...
     *
     * @var string|null $url
     */
    private ?string $url = null;

    /**
     * ...
     *
     * @param string $url
     *   ...
     *
     * @return self
     */
    public function url(string $url): self
    {
        $this->setUrl($url);

        return $this;
    }

    /**
     * ...
     *
     * @param string $url
     *   ...
     *
     * @return void
     */
    public function setUrl(string $url): void
    {
        $this->url = filter_var($url, FILTER_VALIDATE_URL) ? $url : null;
    }

    /**
     * ...
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasUrl(): bool
    {
        return !is_null($this->url);
    }
}

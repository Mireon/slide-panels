<?php

namespace Mireon\SlidePanels\Helpers;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Helpers
 */
class Config
{
    /**
     * ...
     *
     * @var array
     */
    private array $config = [];

    /**
     * ...
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge($config, []);
    }

    /**
     * ...
     *
     * @param string $key
     *   ...
     * @param string|null $value
     *   ...
     *
     * @return void
     */
    public function set(string $key, ?string $value = null): void
    {
        if (empty($key)) {
            return;
        }

        $this->config[$key] = $value;
    }

    /**
     * ...
     *
     * @param string $key
     *   ...
     * @param string|null $default
     *   ...
     *
     * @return mixed
     */
    public function get(string $key, string $default = null)
    {
        if (empty($key)) {
            return null;
        }

        if (!$this->has($key)) {
            return $default;
        }

        return $this->config[$key];
    }

    /**
     * ...
     *
     * @param string $key
     *   ...
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        return !empty($key) && isset($this->config[$key]);
    }
}

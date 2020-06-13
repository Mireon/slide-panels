<?php

namespace Mireon\SlidePanels\Widgets\Menu;

use Exception;
use Mireon\SlidePanels\Renderer\RendererDefault;
use Mireon\SlidePanels\Widgets\Header\HeaderProperty;
use Mireon\SlidePanels\Widgets\Widget;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Widgets\Menu
 */
class Menu extends Widget
{
    use HeaderProperty;

    /**
     * ...
     *
     * @var ItemInterface[] $items
     */
    private array $items = [];

    /**
     * The constructor.
     *
     * @param array|null $items
     *   ...
     *
     * @throws Exception
     */
    public function __construct(?array $items = [])
    {
        $this->setItems($items);
    }

    /**
     * Creates an instance of this class.
     *
     * @param array|null $items
     *   ...
     *
     * @return self
     *
     * @throws Exception
     */
    public static function create(?array $items = []): self
    {
        return new self($items);
    }

    /**
     * ...
     *
     * @param ItemInterface[] $items
     *   ...
     *
     * @return self
     *
     * @throws Exception
     */
    public function items(array $items): self
    {
        $this->setItems($items);

        return $this;
    }

    /**
     * ...
     *
     * @param ItemInterface[] $items
     *   ...
     *
     * @return void
     *
     * @throws Exception
     */
    public function setItems(array $items): void
    {
        $this->reset();

        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    /**
     * ...
     *
     * @param ItemInterface $item
     *   ...
     *
     * @return self
     *
     * @throws Exception
     */
    public function item(ItemInterface $item): self
    {
        $this->addItem($item);

        return $this;
    }

    /**
     * ...
     *
     * @param ItemInterface $item
     *   ...
     *
     * @return void
     *
     * @throws Exception
     */
    public function addItem(ItemInterface $item): void
    {
        if ($item->isValid()) {
            $this->items[] = $item;
        } else {
            throw new Exception('The menu item "' . get_class($item) . '" is invalid.');
        }
    }

    /**
     * ...
     *
     * @return ItemInterface[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * ...
     *
     * @return bool
     */
    public function hasItems(): bool
    {
        return !empty($this->items);
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasItems();
    }

    /**
     * ...
     *
     * @return void
     */
    public function reset(): void
    {
        $this->items = [];
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function render(): string
    {
        return RendererDefault::view('widgets/menu/menu', ['menu' => $this]);
    }
}

<?php

namespace Mireon\SlidePanels\Widgets\Menu;

use ArrayIterator;
use Exception;
use IteratorAggregate;
use Mireon\SlidePanels\Renderer\Renderer;
use Mireon\SlidePanels\Widgets\Widget;
use Traversable;

/**
 * The menu widget.
 *
 * @package Mireon\SlidePanels\Widgets\Menu
 */
class Menu extends Widget implements IteratorAggregate
{
    /**
     * The list of items.
     *
     * @var ItemInterface[] $items
     */
    private array $items = [];

    /**
     * The constructor.
     *
     * @param ItemInterface[] $items
     *   A list of items.
     *
     * @throws Exception
     */
    public function __construct(array $items = [])
    {
        $this->setItems($items);
    }

    /**
     * Creates the menu widget.
     *
     * @param ItemInterface[] $items
     *   A list of items.
     *
     * @return static
     *
     * @throws Exception
     */
    public static function create(array $items = []): self
    {
        return new static($items);
    }

    /**
     * Sets the list of items.
     *
     * @param ItemInterface[] $items
     *   A list of items.
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
     * Sets the list of items.
     *
     * @param ItemInterface[] $items
     *   A list of items.
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
     * Adds a new item to the list.
     *
     * @param ItemInterface $item
     *   A new item.
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
     * Adds a new item to the list.
     *
     * @param ItemInterface $item
     *   A new item.
     *
     * @return void
     *
     * @throws Exception
     */
    public function addItem(ItemInterface $item): void
    {
        if (!$item->isValid()) {
            throw new Exception('Menu item "' . get_class($item) . '" is invalid.');
        }

        $this->items[] = $item;
    }

    /**
     * Returns the list of items.
     *
     * @return ItemInterface[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Checks if items exists.
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
     * Clears the list of items.
     *
     * @return void
     */
    public function reset(): void
    {
        $this->items = [];
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->getItems());
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return Renderer::render('widgets/menu/menu', ['menu' => $this]);
    }
}

<?php

namespace Mireon\SlidePanels\Modules\Widgets\Menu;

use Mireon\SlidePanels\Exceptions\FileNotFound;
use Mireon\SlidePanels\Modules\Widgets\Header\HeaderProperty;
use Mireon\SlidePanels\Modules\Widgets\Menu\Exceptions\ItemIsInvalid;
use Mireon\SlidePanels\Modules\Widgets\WidgetInterface;
use Mireon\SlidePanels\Renderer\Renderer;

/**
 * ...
 *
 * @package Mireon\SlidePanels\Modules\Widgets\Menu
 */
class Menu implements WidgetInterface
{
    use HeaderProperty;

    /**
     * ...
     *
     * @var ItemInterface[] $items
     */
    private array $items = [];

    /**
     * Creates an instance of this class.
     *
     * @return static
     */
    public static function create(): self
    {
        return new static();
    }

    /**
     * ...
     *
     * @param ItemInterface[] $items
     *   ...
     *
     * @return self
     *
     * @throws ItemIsInvalid
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
     * @throws ItemIsInvalid
     */
    public function setItems(array $items): void
    {
        $this->items = [];

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
     * @throws ItemIsInvalid
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
     * @throws ItemIsInvalid
     */
    public function addItem(ItemInterface $item): void
    {
        if ($item->isValid()) {
            $this->items[] = $item;
        } else {
            throw new ItemIsInvalid($item);
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
     * @inheritDoc
     *
     * @throws FileNotFound
     */
    public function render(): string
    {
        return Renderer::view('widgets/menu/menu', ['menu' => $this]);
    }
}

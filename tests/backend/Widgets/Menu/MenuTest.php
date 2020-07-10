<?php

namespace Mireon\SlidePanels\Tests\Widgets\Menu;

use Exception;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\ItemInterface;
use Mireon\SlidePanels\Widgets\Menu\Menu;
use PHPUnit\Framework\TestCase;

/**
 * Test for the menu widget.
 *
 * @covers \Mireon\SlidePanels\Widgets\Menu\Menu
 */
class MenuTest extends TestCase
{
    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::__construct
     *
     * @throws Exception
     */
    public function testConstruct(): void
    {
        // Without param
        $menu = new Menu();
        $this->assertEmpty($menu->getItems());
        $this->assertFalse($menu->hasItems());
        $this->assertIsArray($menu->getItems());

        // With param
        $menu = new Menu([$this->getValidItem(), $this->getValidItem()]);
        $this->assertTrue($menu->hasItems());
        $this->assertIsArray($menu->getItems());
        $this->assertCount(2, $menu->getItems());
    }

    /**
     * Test for the __construct method.
     *
     * Catch an exception when entered an invalid item.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::__construct
     *
     * @throws Exception
     */
    public function testConstructException(): void
    {
        $this->expectException(Exception::class);
        new Menu([$this->getInvalidItem()]);
    }

    /**
     * Test for the create method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::create
     *
     * @throws Exception
     */
    public function testCreate(): void
    {
        // Without param
        $menu = Menu::create();
        $this->assertEmpty($menu->getItems());
        $this->assertFalse($menu->hasItems());
        $this->assertIsArray($menu->getItems());

        // With param
        $menu = Menu::create([$this->getValidItem(), $this->getValidItem()]);
        $this->assertTrue($menu->hasItems());
        $this->assertIsArray($menu->getItems());
        $this->assertCount(2, $menu->getItems());
    }

    /**
     * Test for the create method.
     *
     * Catch an exception when entered an invalid item.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::create
     *
     * @throws Exception
     */
    public function testCreateException(): void
    {
        $this->expectException(Exception::class);
        Menu::create([$this->getInvalidItem()]);
    }

    /**
     * Test for the items method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::items
     *
     * @throws Exception
     */
    public function testItems(): void
    {
        // Initialize
        $menu = new Menu();
        $this->assertFalse($menu->hasItems());
        $this->assertIsArray($menu->getItems());
        $this->assertEmpty($menu->getItems());

        // Set items
        $menu = $menu->items([$this->getValidItem(), $this->getValidItem()]);
        $this->assertInstanceOf(Menu::class, $menu);
        $this->assertTrue($menu->hasItems());
        $this->assertIsArray($menu->getItems());
        $this->assertCount(2, $menu->getItems());
    }

    /**
     * Test for the items method.
     *
     * Catch an exception when entered an invalid item.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::items
     *
     * @throws Exception
     */
    public function testItemsException(): void
    {
        $this->expectException(Exception::class);
        (new Menu())->items([$this->getInvalidItem()]);
    }

    /**
     * Test for the setItems method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::setItems
     *
     * @throws Exception
     */
    public function testSetItems(): void
    {
        // Initialize
        $menu = new Menu();
        $this->assertFalse($menu->hasItems());
        $this->assertIsArray($menu->getItems());
        $this->assertEmpty($menu->getItems());

        // Set items
        $menu->setItems([$this->getValidItem(), $this->getValidItem()]);
        $this->assertTrue($menu->hasItems());
        $this->assertIsArray($menu->getItems());
        $this->assertCount(2, $menu->getItems());
    }

    /**
     * Test for the setItems method.
     *
     * Catch an exception when entered an invalid item.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::setItems
     *
     * @throws Exception
     */
    public function testSetItemsException(): void
    {
        $this->expectException(Exception::class);
        (new Menu())->setItems([$this->getInvalidItem()]);
    }

    /**
     * Test for the item method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::item
     *
     * @return void
     *
     * @throws Exception
     */
    public function testItem(): void
    {
        // Initialize
        $menu = new Menu();
        $this->assertFalse($menu->hasItems());
        $this->assertIsArray($menu->getItems());
        $this->assertEmpty($menu->getItems());

        // Set items
        $menu = $menu->item($this->getValidItem())->item($this->getValidItem());
        $this->assertInstanceOf(Menu::class, $menu);
        $this->assertTrue($menu->hasItems());
        $this->assertIsArray($menu->getItems());
        $this->assertCount(2, $menu->getItems());
    }

    /**
     * Test for the item method.
     *
     * Catch an exception when entered an invalid item.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::item
     *
     * @return void
     *
     * @throws Exception
     */
    public function testItemException(): void
    {
        $this->expectException(Exception::class);
        (new Menu())->item($this->getInvalidItem());
    }

    /**
     * Test for the addItem method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::addItem
     *
     * @return void
     *
     * @throws Exception
     */
    public function testAddItem(): void
    {
        // Initialize
        $menu = new Menu();
        $this->assertFalse($menu->hasItems());
        $this->assertIsArray($menu->getItems());
        $this->assertEmpty($menu->getItems());

        // Set items
        $menu->addItem($this->getValidItem());
        $menu->addItem($this->getValidItem());
        $this->assertTrue($menu->hasItems());
        $this->assertIsArray($menu->getItems());
        $this->assertCount(2, $menu->getItems());
    }

    /**
     * Test for the item method.
     *
     * Catch an exception when entered an invalid item.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::item
     *
     * @return void
     *
     * @throws Exception
     */
    public function testAddItemException(): void
    {
        $this->expectException(Exception::class);
        (new Menu())->addItem($this->getInvalidItem());
    }

    /**
     * Returns a valid item.
     *
     * @return ItemInterface
     */
    private function getValidItem(): ItemInterface
    {
        return new Item('text', 'http://example.com');
    }

    /**
     * Returns a valid item.
     *
     * @return ItemInterface
     */
    private function getInvalidItem(): ItemInterface
    {
        return new Item();
    }

    /**
     * Test for the isValid method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::isValid
     *
     * @return void
     *
     * @throws Exception
     */
    public function testIsValid(): void
    {
        // Invalid
        $menu = new Menu();
        $this->assertFalse($menu->isValid());

        // Valid
        $menu = new Menu([$this->getValidItem()]);
        $this->assertTrue($menu->isValid());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::render
     *
     * @return void
     *
     * @throws Exception
     */
    public function testRender(): void
    {
        $this->assertIsString((new Menu())->render());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Menu::render
     *
     * @return void
     *
     * @throws Exception
     */
    public function testGetIterator(): void
    {
        $this->assertIsIterable((new Menu())->getIterator());
    }
}

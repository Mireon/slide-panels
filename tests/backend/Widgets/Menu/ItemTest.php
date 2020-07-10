<?php

namespace Mireon\SlidePanels\Tests\Widgets\Menu;

use Mireon\SlidePanels\Widgets\Menu\Item;
use PHPUnit\Framework\TestCase;

/**
 * Test for the menu item.
 *
 * @covers \Mireon\SlidePanels\Widgets\Menu\Item
 */
class ItemTest extends TestCase
{
    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        // Without params
        $item = new Item();
        $this->assertFalse($item->hasText());
        $this->assertNull($item->getText());
        $this->assertFalse($item->hasUrl());
        $this->assertNull($item->getUrl());
        $this->assertFalse($item->hasIcon());
        $this->assertNull($item->getIcon());

        // Nullable
        $item = new Item(null, null, null);
        $this->assertFalse($item->hasText());
        $this->assertNull($item->getText());
        $this->assertFalse($item->hasUrl());
        $this->assertNull($item->getUrl());
        $this->assertFalse($item->hasIcon());
        $this->assertNull($item->getIcon());

        // Valid params
        $item = new Item('text', 'http://example.com', 'icon');
        $this->assertTrue($item->hasText());
        $this->assertSame('text', $item->getText());
        $this->assertTrue($item->hasUrl());
        $this->assertSame('http://example.com', $item->getUrl());
        $this->assertTrue($item->hasIcon());
        $this->assertSame('icon', $item->getIcon());
    }

    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        // Without params
        $item = Item::create();
        $this->assertFalse($item->hasText());
        $this->assertNull($item->getText());
        $this->assertFalse($item->hasUrl());
        $this->assertNull($item->getUrl());
        $this->assertFalse($item->hasIcon());
        $this->assertNull($item->getIcon());

        // Nullable
        $item = Item::create(null, null, null);
        $this->assertFalse($item->hasText());
        $this->assertNull($item->getText());
        $this->assertFalse($item->hasUrl());
        $this->assertNull($item->getUrl());
        $this->assertFalse($item->hasIcon());
        $this->assertNull($item->getIcon());

        // Valid params
        $item = Item::create('text', 'http://example.com', 'icon');
        $this->assertTrue($item->hasText());
        $this->assertSame('text', $item->getText());
        $this->assertTrue($item->hasUrl());
        $this->assertSame('http://example.com', $item->getUrl());
        $this->assertTrue($item->hasIcon());
        $this->assertSame('icon', $item->getIcon());
    }

    /**
     * Test for the text property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::text
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::setText
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::getText
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::hasText
     *
     * @return void
     */
    public function testTextProperty(): void
    {
        // Item::text
        $item = (new Item())->text('text');
        $this->assertInstanceOf(Item::class, $item);
        $this->assertTrue($item->hasText());
        $this->assertSame('text', $item->getText());

        // Item::setText
        $item = new Item();
        $item->setText('text');
        $this->assertTrue($item->hasText());
        $this->assertSame('text', $item->getText());
    }

    /**
     * Test for the icon property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::icon
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::setIcon
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::getIcon
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::hasIcon
     *
     * @return void
     */
    public function testIconProperty(): void
    {
        // Item::icon
        $item = (new Item())->icon('icon');
        $this->assertInstanceOf(Item::class, $item);
        $this->assertTrue($item->hasIcon());
        $this->assertSame('icon', $item->getIcon());

        // Item::setIcon
        $item = new Item();
        $item->setIcon('icon');
        $this->assertTrue($item->hasIcon());
        $this->assertSame('icon', $item->getIcon());
    }

    /**
     * Test for the URL property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::url
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::setUrl
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::getUrl
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::hasUrl
     *
     * @return void
     */
    public function testUrsProperty(): void
    {
        // Item::icon
        $item = (new Item())->url('http://example.com');
        $this->assertInstanceOf(Item::class, $item);
        $this->assertTrue($item->hasUrl());
        $this->assertSame('http://example.com', $item->getUrl());

        // Item::setIcon
        $item = new Item();
        $item->setUrl('http://example.com');
        $this->assertTrue($item->hasUrl());
        $this->assertSame('http://example.com', $item->getUrl());

        // Invalid
        $item = new Item();
        $item->setUrl('invalid');
        $this->assertFalse($item->hasUrl());
        $this->assertNull($item->getUrl());
    }

    /**
     * Test for the isValid method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        // Invalid
        $item = new Item();
        $this->assertFalse($item->isValid());

        // Valid
        $item = new Item();
        $item->setText('text');
        $item->setUrl('http://example.com');
        $this->assertTrue($item->isValid());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Menu\Item::render
     *
     * @return void
     */
    public function testRender(): void
    {
        $this->assertIsString((new Item())->render());
    }
}

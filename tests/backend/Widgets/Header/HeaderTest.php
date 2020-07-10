<?php

namespace Mireon\SlidePanels\Tests\Widgets\Header;

use Mireon\SlidePanels\Widgets\Header\Header;
use PHPUnit\Framework\TestCase;

/**
 * Test for header widget.
 *
 * @covers \Mireon\SlidePanels\Widgets\Header\Header
 */
class HeaderTest extends TestCase
{
    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        // Without params
        $header = new Header();
        $this->assertSame(Header::BIG, $header->getSize());
        $this->assertFalse($header->hasText());
        $this->assertNull($header->getText());
        $this->assertFalse($header->hasIcon());
        $this->assertNull($header->getIcon());

        // Nullable
        $header = new Header(null, null);
        $this->assertSame(Header::BIG, $header->getSize());
        $this->assertFalse($header->hasText());
        $this->assertNull($header->getText());
        $this->assertFalse($header->hasIcon());
        $this->assertNull($header->getIcon());

        // With params
        $header = new Header('text', 'icon');
        $this->assertSame(Header::BIG, $header->getSize());
        $this->assertTrue($header->hasText());
        $this->assertSame('text', $header->getText());
        $this->assertTrue($header->hasIcon());
        $this->assertSame('icon', $header->getIcon());
    }

    /**
     * Test for the create method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        // Without params
        $header = Header::create();
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame(Header::BIG, $header->getSize());
        $this->assertFalse($header->hasText());
        $this->assertNull($header->getText());
        $this->assertFalse($header->hasIcon());
        $this->assertNull($header->getIcon());

        // Nullable
        $header = Header::create(null, null, null);
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame(Header::BIG, $header->getSize());
        $this->assertFalse($header->hasText());
        $this->assertNull($header->getText());
        $this->assertFalse($header->hasIcon());
        $this->assertNull($header->getIcon());

        // With params
        $header = Header::create('text', 'icon', Header::SMALL);
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame(Header::SMALL, $header->getSize());
        $this->assertTrue($header->hasText());
        $this->assertSame('text', $header->getText());
        $this->assertTrue($header->hasIcon());
        $this->assertSame('icon', $header->getIcon());
    }

    /**
     * Test for the big method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::big
     *
     * @return void
     */
    public function testBig(): void
    {
        // Without params
        $header = Header::big();
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame(Header::BIG, $header->getSize());
        $this->assertFalse($header->hasText());
        $this->assertNull($header->getText());
        $this->assertFalse($header->hasIcon());
        $this->assertNull($header->getIcon());

        // Nullable
        $header = Header::big(null, null);
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame(Header::BIG, $header->getSize());
        $this->assertFalse($header->hasText());
        $this->assertNull($header->getText());
        $this->assertFalse($header->hasIcon());
        $this->assertNull($header->getIcon());

        // With params
        $header = Header::big('text', 'icon');
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame(Header::BIG, $header->getSize());
        $this->assertTrue($header->hasText());
        $this->assertSame('text', $header->getText());
        $this->assertTrue($header->hasIcon());
        $this->assertSame('icon', $header->getIcon());
    }

    /**
     * Test for the big method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::small
     *
     * @return void
     */
    public function testSmall(): void
    {
        // Without params
        $header = Header::small();
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame(Header::SMALL, $header->getSize());
        $this->assertFalse($header->hasText());
        $this->assertNull($header->getText());
        $this->assertFalse($header->hasIcon());
        $this->assertNull($header->getIcon());

        // Nullable
        $header = Header::small(null, null);
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame(Header::SMALL, $header->getSize());
        $this->assertFalse($header->hasText());
        $this->assertNull($header->getText());
        $this->assertFalse($header->hasIcon());
        $this->assertNull($header->getIcon());

        // With params
        $header = Header::small('text', 'icon');
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame(Header::SMALL, $header->getSize());
        $this->assertTrue($header->hasText());
        $this->assertSame('text', $header->getText());
        $this->assertTrue($header->hasIcon());
        $this->assertSame('icon', $header->getIcon());
    }

    /**
     * Test for the size property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::size
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::setSize
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::getSize
     *
     * @return void
     */
    public function testSizeProperty(): void
    {
        // Header::size
        $header = (new Header())->size(Header::SMALL);
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame(Header::SMALL, $header->getSize());

        // Header::setSize
        $header = new Header();
        $header->setSize(Header::SMALL);
        $this->assertSame(Header::SMALL, $header->getSize());

        // Invalid
        $header = new Header();
        $header->text('medium');
        $this->assertSame(Header::BIG, $header->getSize());
    }

    /**
     * Test for the text property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::text
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::setText
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::getText
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::hasText
     *
     * @return void
     */
    public function testTextProperty(): void
    {
        // Header::text
        $header = (new Header())->text('text');
        $this->assertInstanceOf(Header::class, $header);
        $this->assertTrue($header->hasText());
        $this->assertSame('text', $header->getText());

        // Header::setText
        $header = new Header();
        $header->text('text');
        $this->assertTrue($header->hasText());
        $this->assertSame('text', $header->getText());
    }

    /**
     * Test for the icon property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::icon
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::setIcon
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::getIcon
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::hasIcon
     *
     * @return void
     */
    public function testIconProperty(): void
    {
        // Header::icon
        $header = (new Header())->icon('icon');
        $this->assertInstanceOf(Header::class, $header);
        $this->assertTrue($header->hasIcon());
        $this->assertSame('icon', $header->getIcon());

        // Header::setIcon
        $header = new Header();
        $header->icon('icon');
        $this->assertTrue($header->hasIcon());
        $this->assertSame('icon', $header->getIcon());
    }

    /**
     * Test for the isValid method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        // Invalid
        $header = new Header();
        $this->assertFalse($header->isValid());

        // Valid
        $header = new Header();
        $header->setText('text');
        $this->assertTrue($header->isValid());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Header\Header::render
     *
     * @return void
     */
    public function testRender(): void
    {
        $this->assertIsString((new Header())->render());
    }
}

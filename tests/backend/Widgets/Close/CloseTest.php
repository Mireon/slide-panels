<?php

namespace Mireon\SlidePanels\Tests\Widgets\Close;

use Mireon\SlidePanels\Widgets\Close\Close;
use PHPUnit\Framework\TestCase;

/**
 * Test for close widget.
 *
 * @covers \Mireon\SlidePanels\Widgets\Close\Close
 */
class CloseTest extends TestCase
{
    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Close\Close::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        // Without params
        $close = new Close();
        $this->assertFalse($close->hasText());
        $this->assertNull($close->getText());
        $this->assertFalse($close->hasIcon());
        $this->assertNull($close->getIcon());

        // Nullable
        $close = new Close(null, null);
        $this->assertFalse($close->hasText());
        $this->assertNull($close->getText());
        $this->assertFalse($close->hasIcon());
        $this->assertNull($close->getIcon());

        // With params
        $close = new Close('text', 'icon');
        $this->assertTrue($close->hasText());
        $this->assertSame('text', $close->getText());
        $this->assertTrue($close->hasIcon());
        $this->assertSame('icon', $close->getIcon());
    }

    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Close\Close::__construct
     *
     * @return void
     */
    public function testCreate(): void
    {
        // Without params
        $close = Close::create();
        $this->assertInstanceOf(Close::class, $close);
        $this->assertFalse($close->hasText());
        $this->assertNull($close->getText());
        $this->assertFalse($close->hasIcon());
        $this->assertNull($close->getIcon());

        // Nullable
        $close = Close::create(null, null);
        $this->assertInstanceOf(Close::class, $close);
        $this->assertFalse($close->hasText());
        $this->assertNull($close->getText());
        $this->assertFalse($close->hasIcon());
        $this->assertNull($close->getIcon());

        // With params
        $close = Close::create('text', 'icon');
        $this->assertInstanceOf(Close::class, $close);
        $this->assertTrue($close->hasText());
        $this->assertSame('text', $close->getText());
        $this->assertTrue($close->hasIcon());
        $this->assertSame('icon', $close->getIcon());
    }

    /**
     * Test for the text property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Close\Close::text
     * @covers \Mireon\SlidePanels\Widgets\Close\Close::setText
     * @covers \Mireon\SlidePanels\Widgets\Close\Close::getText
     * @covers \Mireon\SlidePanels\Widgets\Close\Close::hasText
     *
     * @return void
     */
    public function testTextProperty(): void
    {
        // Close::text
        $close = (new Close())->text('text');
        $this->assertInstanceOf(Close::class, $close);
        $this->assertTrue($close->hasText());
        $this->assertSame('text', $close->getText());

        // Close::setText
        $close = new Close();
        $close->text('text');
        $this->assertTrue($close->hasText());
        $this->assertSame('text', $close->getText());
    }

    /**
     * Test for the icon property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Close\Close::icon
     * @covers \Mireon\SlidePanels\Widgets\Close\Close::setIcon
     * @covers \Mireon\SlidePanels\Widgets\Close\Close::getIcon
     * @covers \Mireon\SlidePanels\Widgets\Close\Close::hasIcon
     *
     * @return void
     */
    public function testIconProperty(): void
    {
        // Close::icon
        $close = (new Close())->icon('icon');
        $this->assertInstanceOf(Close::class, $close);
        $this->assertTrue($close->hasIcon());
        $this->assertSame('icon', $close->getIcon());

        // Close::setIcon
        $close = new Close();
        $close->icon('icon');
        $this->assertTrue($close->hasIcon());
        $this->assertSame('icon', $close->getIcon());
    }

    /**
     * Test for the isValid method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Close\Close::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        // Valid
        $close = new Close();
        $this->assertTrue($close->isValid());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Close\Close::render
     *
     * @return void
     */
    public function testRender(): void
    {
        $this->assertIsString((new Close())->render());
    }
}

<?php

namespace Mireon\SlidePanels\Tests\Panels;

use Exception;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\PanelStyles;
use Mireon\SlidePanels\Widgets\WidgetInterface;
use Mireon\SlidePanels\Widgets\Widgets;
use PHPUnit\Framework\TestCase;

/**
 * Tests for a panel.
 *
 * @covers \Mireon\SlidePanels\Panels\Panel
 */
class PanelTest extends TestCase
{
    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Panels\Panel::__construct
     *
     * @return void
     *
     * @throws Exception
     */
    public function testConstruct(): void
    {
        // Initialize
        $panel = new Panel();
        $this->assertInstanceOf(PanelStyles::class, $panel->getStyles());
        $this->assertInstanceOf(Widgets::class, $panel->getWidgets());

        // Without params
        $panel = new Panel();
        $this->assertNull($panel->getKey());
        $this->assertSame(Panel::LEFT, $panel->getSide());

        // Nullable params
        $panel = new Panel(null, null);
        $this->assertNull($panel->getKey());
        $this->assertSame(Panel::LEFT, $panel->getSide());

        // Empty params
        $panel = new Panel('', '');
        $this->assertNull($panel->getKey());
        $this->assertSame(Panel::LEFT, $panel->getSide());

        // Valid params
        $panel = new Panel('key', Panel::RIGHT);
        $this->assertSame('key', $panel->getKey());
        $this->assertSame(Panel::RIGHT, $panel->getSide());
    }

    /**
     * Test for the create method.
     *
     * @covers \Mireon\SlidePanels\Panels\Panel::create
     *
     * @return void
     *
     * @throws Exception
     */
    public function testCreate(): void
    {
        // Initialize
        $panel = Panel::create();
        $this->assertInstanceOf(Panel::class, $panel);
        $this->assertInstanceOf(PanelStyles::class, $panel->getStyles());
        $this->assertInstanceOf(Widgets::class, $panel->getWidgets());

        // Without params
        $panel = Panel::create();
        $this->assertInstanceOf(Panel::class, $panel);
        $this->assertNull($panel->getKey());
        $this->assertSame(Panel::LEFT, $panel->getSide());

        // Nullable params
        $panel = Panel::create(null, null);
        $this->assertInstanceOf(Panel::class, $panel);
        $this->assertNull($panel->getKey());
        $this->assertSame(Panel::LEFT, $panel->getSide());

        // Empty params
        $panel = Panel::create('', '');
        $this->assertInstanceOf(Panel::class, $panel);
        $this->assertNull($panel->getKey());
        $this->assertSame(Panel::LEFT, $panel->getSide());

        // Valid params
        $panel = Panel::create('key', Panel::RIGHT);
        $this->assertInstanceOf(Panel::class, $panel);
        $this->assertSame('key', $panel->getKey());
        $this->assertSame(Panel::RIGHT, $panel->getSide());
    }

    /**
     * Data for testing key property.
     *
     * @see testKey()
     *
     * @return array
     */
    public function providerKey(): array
    {
        return [
            'Nullable' => [ null, null, false ],
            'Empty' => [ '', null, false ],
            'Whitespace 1' => [ ' ', null, false ],
            'Whitespace 2' => [ ' key ', 'key', true ],
            'Whitespace 3' => [ ' key key ', 'key-key', true ],
            'Special chars' => [ '& " \' > < ', '&amp;-&quot;-&#039;-&gt;-&lt;', true ],
            'Uppercase chars' => [ 'KEY', 'key', true ],
            'Valid 1' => [ 'key', 'key', true ],
        ];
    }

    /**
     * Test for the key property and its methods.
     *
     * @covers \Mireon\SlidePanels\Panels\Panel::key
     * @covers \Mireon\SlidePanels\Panels\Panel::setKey
     * @covers \Mireon\SlidePanels\Panels\Panel::getKey
     * @covers \Mireon\SlidePanels\Panels\Panel::hasKey
     *
     * @dataProvider providerKey
     *
     * @param string|null $passed
     * @param string|null $expected
     * @param bool $has
     *
     * @return void
     *
     * @throws Exception
     */
    public function testKeyProperty(?string $passed, ?string $expected, bool $has): void
    {
        // Panel::key()
        $panel = Panel::create()->key($passed);
        $this->assertInstanceOf(Panel::class, $panel);
        $this->assertSame($expected, $panel->getKey());
        $this->assertSame($has, $panel->hasKey());

        // Panel::setKey()
        $panel = new Panel();
        $panel->setKey($passed);
        $this->assertSame($expected, $panel->getKey());
        $this->assertSame($has, $panel->hasKey());
    }

    /**
     * Data for testing side property.
     *
     * @see testSide()
     *
     * @return array
     */
    public function providerSide(): array
    {
        return [
            'Nullable' => [ null, Panel::LEFT ],
            'Empty' => [ '', Panel::LEFT ],
            'Invalid' => [ 'invalid', Panel::LEFT ],
            'Valid 1' => [ Panel::LEFT, Panel::LEFT ],
            'Valid 2' => [ Panel::RIGHT, Panel::RIGHT ],
        ];
    }

    /**
     * Test for the side property and its methods.
     *
     * @covers \Mireon\SlidePanels\Panels\Panel::side
     * @covers \Mireon\SlidePanels\Panels\Panel::setSide
     * @covers \Mireon\SlidePanels\Panels\Panel::getSide
     *
     * @dataProvider providerSide
     *
     * @param string|null $passed
     * @param string|null $expected
     *
     * @return void
     *
     * @throws Exception
     */
    public function testSideProperty(?string $passed, ?string $expected): void
    {
        // Panel::side()
        $panel = Panel::create()->side($passed);
        $this->assertInstanceOf(Panel::class, $panel);
        $this->assertSame($expected, $panel->getSide());

        // Panel::setSide()
        $panel = new Panel();
        $panel->setSide($passed);
        $this->assertSame($expected, $panel->getSide());
    }

    /**
     * Test for the width methods.
     *
     * @covers \Mireon\SlidePanels\Panels\Panel::width
     * @covers \Mireon\SlidePanels\Panels\Panel::setWidth
     *
     * @return void
     *
     * @throws Exception
     */
    public function testWidthProperty(): void
    {
        // Panel::width()
        $panel = Panel::create()->width(10);
        $this->assertInstanceOf(Panel::class, $panel);
        $this->assertSame(10, $panel->getStyles()->getWidth());

        // Panel::setWidth()
        $panel = new Panel();
        $panel->setWidth(15);
        $this->assertSame(15, $panel->getStyles()->getWidth());
    }

    /**
     * Test for the styles methods.
     *
     * @covers \Mireon\SlidePanels\Panels\Panel::getStyles
     * @covers \Mireon\SlidePanels\Panels\Panel::hasStyles
     *
     * @return void
     *
     * @throws Exception
     */
    public function testStylesProperty(): void
    {
        // Without key
        $panel = new Panel();
        $this->assertFalse($panel->hasStyles());
        $this->assertInstanceOf(PanelStyles::class, $panel->getStyles());

        // With panel key
        $panel = new Panel();
        $panel->setKey('key');
        $this->assertTrue($panel->hasStyles());
    }

    /**
     * Test for the widgets property and its methods.
     *
     * @covers \Mireon\SlidePanels\Panels\Panel::widgets
     * @covers \Mireon\SlidePanels\Panels\Panel::setWidgets
     * @covers \Mireon\SlidePanels\Panels\Panel::getWidgets
     * @covers \Mireon\SlidePanels\Panels\Panel::hasWidgets
     * @covers \Mireon\SlidePanels\Panels\Panel::widget
     * @covers \Mireon\SlidePanels\Panels\Panel::addWidget
     *
     * @return void
     *
     * @throws Exception
     */
    public function testWidgetsProperty(): void
    {
        // Initialize
        $panel = new Panel();
        $this->assertTrue($panel->hasWidgets());
        $this->assertInstanceOf(Widgets::class, $panel->getWidgets());
        $this->assertEmpty($panel->getWidgets()->getWidgets());

        // Panel::widget()
        $panel = (new Panel())->widget($this->getWidget());
        $this->assertNotEmpty($panel->getWidgets()->getWidgets());
        $this->assertCount(1, $panel->getWidgets()->getWidgets());

        // Panel::addWidget()
        $panel = new Panel();
        $panel->addWidget($this->getWidget());
        $this->assertCount(1, $panel->getWidgets()->getWidgets());

        // Panel::widgets()
        $widgets = new Widgets();
        $panel = (new Panel())->widgets($widgets);
        $this->assertTrue($widgets === $panel->getWidgets());

        // Panel::setWidgets()
        $widgets = new Widgets();
        $panel = new Panel();
        $panel->setWidgets($widgets);
        $this->assertTrue($widgets === $panel->getWidgets());
    }

    /**
     * Test for the isValid method.
     *
     * @covers \Mireon\SlidePanels\Panels\Panel::isValid
     *
     * @return void
     *
     * @throws Exception
     */
    public function testIsValid(): void
    {
        // Invalid
        $panel = new Panel();
        $this->assertFalse($panel->isValid());

        // Valid
        $panel = new Panel();
        $panel->setKey('key');
        $this->assertTrue($panel->isValid());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Panels\Panel::render
     *
     * @return void
     *
     * @throws Exception
     */
    public function testRender(): void
    {
        $this->assertIsString((new Panel())->render());
    }

    /**
     * Returns a test widget.
     *
     * @return WidgetInterface
     */
    private function getWidget(): WidgetInterface
    {
        return new class implements WidgetInterface {
            public function render(): string { return ''; }
            public function isValid(): bool { return true; }
            public function getWeight(): int { return 0; }
        };
    }
}

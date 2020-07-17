<?php

namespace Mireon\SlidePanels\Tests\Widgets;

use Exception;
use Mireon\SlidePanels\Widgets\Widget;
use Mireon\SlidePanels\Widgets\WidgetInterface;
use Mireon\SlidePanels\Widgets\Widgets;
use PHPUnit\Framework\TestCase;

/**
 * Test for widgets container.
 *
 * @covers \Mireon\SlidePanels\Widgets\Widgets
 */
class WidgetsTest extends TestCase
{
    /**
     * Test for the __construct method.
     *
     * @return void
     *
     * @throws Exception
     */
    public function testConstruct(): void
    {
        // Without param
        $widgets = new Widgets();
        $this->assertEmpty($widgets->getWidgets());
        $this->assertFalse($widgets->hasWidgets());

        // With param
        $widgets = new Widgets([$this->getWidget()]);
        $this->assertNotEmpty($widgets->getWidgets());
        $this->assertCount(1, $widgets->getWidgets());
        $this->assertTrue($widgets->hasWidgets());
    }

    /**
     * Test for the create method.
     *
     * @return void
     *
     * @throws Exception
     */
    public function testCreate(): void
    {
        // Without param
        $widgets = Widgets::create();
        $this->assertInstanceOf(Widgets::class, $widgets);
        $this->assertEmpty($widgets->getWidgets());
        $this->assertFalse($widgets->hasWidgets());

        // With param
        $widgets = Widgets::create([$this->getWidget()]);
        $this->assertInstanceOf(Widgets::class, $widgets);
        $this->assertNotEmpty($widgets->getWidgets());
        $this->assertCount(1, $widgets->getWidgets());
        $this->assertTrue($widgets->hasWidgets());
    }

    /**
     * Test for the widget property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Widgets::widgets
     * @covers \Mireon\SlidePanels\Widgets\Widgets::setWidgets
     * @covers \Mireon\SlidePanels\Widgets\Widgets::getWidgets
     * @covers \Mireon\SlidePanels\Widgets\Widgets::hasWidgets
     *
     * @return void
     *
     * @throws Exception
     */
    public function testWidgetsProperty(): void
    {
        // Widgets::widgets()
        $widgets = new Widgets();
        $widgets = $widgets->widgets([$this->getWidget(), $this->getWidget()]);
        $this->assertInstanceOf(Widgets::class, $widgets);
        $this->assertIsArray($widgets->getWidgets());
        $this->assertTrue($widgets->hasWidgets());
        $this->assertCount(2, $widgets->getWidgets());

        // Widgets::setWidgets()
        $widgets = new Widgets();
        $widgets->setWidgets([$this->getWidget(), $this->getWidget()]);
        $this->assertIsArray($widgets->getWidgets());
        $this->assertTrue($widgets->hasWidgets());
        $this->assertCount(2, $widgets->getWidgets());
    }

    /**
     * Test for the widgets method.
     *
     * Catch an exception when entered an invalid widget.
     *
     * @covers \Mireon\SlidePanels\Widgets\Widgets::widgets
     *
     * @return void
     *
     * @throws Exception
     */
    public function testWidgetsException(): void
    {
        $this->expectException(Exception::class);
        (new Widgets())->widgets([$this->getInvalidWidget()]);
    }

    /**
     * Test for the setWidgets method.
     *
     * Catch an exception when entered an invalid widget.
     *
     * @covers \Mireon\SlidePanels\Widgets\Widgets::setWidgets
     *
     * @return void
     *
     * @throws Exception
     */
    public function testSetWidgetsException(): void
    {
        $this->expectException(Exception::class);
        (new Widgets())->setWidgets([$this->getInvalidWidget()]);
    }

    /**
     * Test for the widget property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Widgets::widget
     * @covers \Mireon\SlidePanels\Widgets\Widgets::addWidget
     * @covers \Mireon\SlidePanels\Widgets\Widgets::getWidgets
     * @covers \Mireon\SlidePanels\Widgets\Widgets::hasWidgets
     *
     * @return void
     *
     * @throws Exception
     */
    public function testWidgetProperty(): void
    {
        // Widgets::widget()
        $widgets = new Widgets();
        $widgets = $widgets->widget($this->getWidget())->widget($this->getWidget());
        $this->assertInstanceOf(Widgets::class, $widgets);
        $this->assertIsArray($widgets->getWidgets());
        $this->assertTrue($widgets->hasWidgets());
        $this->assertCount(2, $widgets->getWidgets());

        // Widgets::addWidget()
        $widgets = new Widgets();
        $widgets->addWidget($this->getWidget());
        $widgets->addWidget($this->getWidget());
        $this->assertIsArray($widgets->getWidgets());
        $this->assertTrue($widgets->hasWidgets());
        $this->assertCount(2, $widgets->getWidgets());
    }

    /**
     * Test for the widget method.
     *
     * Catch an exception when entered an invalid widget.
     *
     * @covers \Mireon\SlidePanels\Widgets\Widgets::widget
     *
     * @return void
     *
     * @throws Exception
     */
    public function testWidgetException(): void
    {
        $this->expectException(Exception::class);
        (new Widgets())->widget($this->getInvalidWidget());
    }

    /**
     * Test for the addWidget method.
     *
     * Catch an exception when entered an invalid widget.
     *
     * @covers \Mireon\SlidePanels\Widgets\Widgets::addWidget
     *
     * @return void
     *
     * @throws Exception
     */
    public function testAddWidgetException(): void
    {
        $this->expectException(Exception::class);
        (new Widgets())->addWidget($this->getInvalidWidget());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Widgets::render
     *
     * @return void
     *
     * @throws Exception
     */
    public function testRender(): void
    {
        $this->assertIsString((new Widgets())->render());
    }

    /**
     * Test for the reset method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Widgets::reset
     *
     * @return void
     *
     * @throws Exception
     */
    public function testReset(): void
    {
        // Initialize
        $widgets = new Widgets([$this->getWidget(), $this->getWidget()]);
        $this->assertCount(2, $widgets->getWidgets());

        // Reset
        $widgets->reset();
        $this->assertCount(0, $widgets->getWidgets());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Widgets::getIterator
     *
     * @return void
     *
     * @throws Exception
     */
    public function testGetIterator(): void
    {
        $this->assertIsIterable((new Widgets())->getIterator());
    }
    /**
     * Returns a test widget.
     *
     * @return WidgetInterface
     */
    private function getWidget(): WidgetInterface
    {
        return new class extends Widget implements WidgetInterface {
            public function render(): string { return ''; }
            public function isValid(): bool { return true; }
        };
    }

    /**
     * Returns a test widget.
     *
     * @return WidgetInterface
     */
    private function getInvalidWidget(): WidgetInterface
    {
        return new class extends Widget implements WidgetInterface {
            public function render(): string { return ''; }
            public function isValid(): bool { return false; }
        };
    }
}

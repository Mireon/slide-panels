<?php

namespace Mireon\SlidePanels\Tests\Widgets;

use Mireon\SlidePanels\Widgets\Widget;
use Mireon\SlidePanels\Widgets\WidgetInterface;
use PHPUnit\Framework\TestCase;

/**
 * Test for a widget.
 *
 * @covers \Mireon\SlidePanels\Widgets\Widget
 */
class WidgetTest extends TestCase
{
    /**
     * Test for the key property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Widget::key
     * @covers \Mireon\SlidePanels\Widgets\Widget::setKey
     * @covers \Mireon\SlidePanels\Widgets\Widget::getKey
     * @covers \Mireon\SlidePanels\Widgets\Widget::hasKey
     *
     * @return void
     */
    public function testKeyProperty(): void
    {
        // Initialize
        $widget = $this->getMockForAbstractClass(Widget::class);
        $this->assertNull($widget->getKey());
        $this->assertFalse($widget->hasKey());

        // Widget::key()
        $widget = $widget->key('red');
        $this->assertInstanceOf(WidgetInterface::class, $widget);
        $this->assertSame('red', $widget->getKey());
        $this->assertTrue($widget->hasKey());

        // Widget::setKey()
        $widget->setKey('black');
        $this->assertSame('black', $widget->getKey());
    }
    
    /**
     * Test for the weight property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Widget::weight
     * @covers \Mireon\SlidePanels\Widgets\Widget::setWeight
     * @covers \Mireon\SlidePanels\Widgets\Widget::getWeight
     *
     * @return void
     */
    public function testWeightProperty(): void
    {
        // Initialize
        $widget = $this->getMockForAbstractClass(Widget::class);
        $this->assertSame(0, $widget->getWeight());

        // Widget::weight()
        $widget = $widget->weight(10);
        $this->assertInstanceOf(WidgetInterface::class, $widget);
        $this->assertSame(10, $widget->getWeight());

        // Widget::setWeight()
        $widget->setWeight(20);
        $this->assertSame(20, $widget->getWeight());
    }
}

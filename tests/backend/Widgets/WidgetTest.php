<?php

namespace Mireon\SlidePanels\Tests\Widgets;

use Mireon\SlidePanels\Widgets\Widget;
use PHPUnit\Framework\TestCase;

/**
 * Test for a widget.
 *
 * @covers \Mireon\SlidePanels\Widgets\Widget
 */
class WidgetTest extends TestCase
{
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
        $this->assertInstanceOf(Widget::class, $widget);
        $this->assertSame(10, $widget->getWeight());

        // Widget::setWeight()
        $widget->setWeight(20);
        $this->assertSame(20, $widget->getWeight());
    }
}

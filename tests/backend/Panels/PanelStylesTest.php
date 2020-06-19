<?php

namespace Mireon\SlidePanels\Tests\Panels;

use Exception;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\PanelStyles;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Test for the panel styles.
 *
 * @covers \Mireon\SlidePanels\Panels\PanelStyles
 */
class PanelStylesTest extends TestCase
{
    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelStyles::__construct
     *
     * @return void
     *
     * @throws Exception
     */
    public function testConstruct(): void
    {
        // Private panel property
        $property = (new ReflectionClass(PanelStyles::class))->getProperty('panel');
        $property->setAccessible(true);

        // Instances
        $panel = new Panel();
        $styles = new PanelStyles($panel);
        $this->assertTrue($panel === $property->getValue($styles));
    }

    /**
     * Test for the width property and its methods.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelStyles::width
     * @covers \Mireon\SlidePanels\Panels\PanelStyles::setWidth
     * @covers \Mireon\SlidePanels\Panels\PanelStyles::getWidth
     *
     * @return void
     *
     * @throws Exception
     */
    public function testWidthProperty(): void
    {
        // Initialize
        $panel = new Panel('key');
        $styles = new PanelStyles($panel);
        $this->assertSame(320, $styles->getWidth());

        // PanelStyles::width()
        $styles = (new PanelStyles($panel))->width(500);
        $this->assertSame(500, $styles->getWidth());

        // PanelStyles::setWidth()
        $styles = new PanelStyles($panel);
        $styles->setWidth(400);
        $this->assertSame(400, $styles->getWidth());
    }

    /**
     * Test for the width method.
     *
     * Catch an exception when entered a value less then 0.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelStyles::width
     *
     * @throws Exception
     *
     * @return void
     */
    public function testWidthException(): void
    {
        $this->expectException(Exception::class);

        (new PanelStyles(new Panel('key')))->width(-10);
    }

    /**
     * Test for the setWidth method.
     *
     * Catch an exception when entered a value less then 0.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelStyles::setWidth
     *
     * @return void
     *
     * @throws Exception
     */
    public function testSetWidthException(): void
    {
        $this->expectException(Exception::class);
        (new PanelStyles(new Panel('key')))->setWidth(-10);
    }

    /**
     * Test for the isValid method.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelStyles::isValid
     *
     * @return void
     *
     * @throws Exception
     */
    public function testIsValid(): void
    {
        // Valid
        $styles = new PanelStyles(new Panel('key'));
        $this->assertTrue($styles->isValid());

        // Invalid
        $styles = new PanelStyles(new Panel());
        $this->assertFalse($styles->isValid());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelStyles::render
     *
     * @return void
     *
     * @throws Exception
     */
    public function testRender(): void
    {
        $this->assertIsString((new PanelStyles(new Panel('key')))->render());
    }

    /**
     * Test for the doUse method.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelStyles::doUse
     *
     * @return void
     *
     * @throws Exception
     */
    public function testDoUse(): void
    {
        // False
        $styles = new PanelStyles(new Panel('key'));
        $styles->setWidth(320);
        $this->assertFalse($styles->doUse());

        // True
        $styles = new PanelStyles(new Panel('key'));
        $styles->setWidth(400);
        $this->assertTrue($styles->doUse());
    }
}

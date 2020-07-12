<?php

namespace Mireon\SlidePanels\Tests\Panels;

use Exception;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\PanelParams;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Test for the panel styles.
 *
 * @covers \Mireon\SlidePanels\Panels\PanelParams
 */
class PanelStylesTest extends TestCase
{
    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelParams::__construct
     *
     * @return void
     *
     * @throws Exception
     */
    public function testConstruct(): void
    {
        // Private panel property
        $property = (new ReflectionClass(PanelParams::class))->getProperty('panel');
        $property->setAccessible(true);

        // Instances
        $panel = new Panel();
        $styles = new PanelParams($panel);
        $this->assertTrue($panel === $property->getValue($styles));
    }

    /**
     * Test for the width property and its methods.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelParams::width
     * @covers \Mireon\SlidePanels\Panels\PanelParams::setWidth
     * @covers \Mireon\SlidePanels\Panels\PanelParams::getWidth
     *
     * @return void
     *
     * @throws Exception
     */
    public function testWidthProperty(): void
    {
        // Initialize
        $panel = new Panel('key');
        $styles = new PanelParams($panel);
        $this->assertSame(320, $styles->getWidth());

        // PanelStyles::width()
        $styles = (new PanelParams($panel))->width(500);
        $this->assertSame(500, $styles->getWidth());

        // PanelStyles::setWidth()
        $styles = new PanelParams($panel);
        $styles->setWidth(400);
        $this->assertSame(400, $styles->getWidth());
    }

    /**
     * Test for the width method.
     *
     * Catch an exception when entered a value less then 0.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelParams::width
     *
     * @return void
     *@throws Exception
     *
     */
    public function testWidthException(): void
    {
        $this->expectException(Exception::class);

        (new PanelParams(new Panel('key')))->width(-10);
    }

    /**
     * Test for the setWidth method.
     *
     * Catch an exception when entered a value less then 0.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelParams::setWidth
     *
     * @return void
     *
     * @throws Exception
     */
    public function testSetWidthException(): void
    {
        $this->expectException(Exception::class);
        (new PanelParams(new Panel('key')))->setWidth(-10);
    }

    /**
     * Test for the isValid method.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelParams::isValid
     *
     * @return void
     *
     * @throws Exception
     */
    public function testIsValid(): void
    {
        // Valid
        $styles = new PanelParams(new Panel('key'));
        $this->assertTrue($styles->isValid());

        // Invalid
        $styles = new PanelParams(new Panel());
        $this->assertFalse($styles->isValid());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelParams::render
     *
     * @return void
     *
     * @throws Exception
     */
    public function testRender(): void
    {
        $this->assertIsString((new PanelParams(new Panel('key')))->render());
    }

    /**
     * Test for the doUse method.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelParams::doUse
     *
     * @return void
     *
     * @throws Exception
     */
    public function testDoUse(): void
    {
        // False
        $styles = new PanelParams(new Panel('key'));
        $styles->setWidth(320);
        $this->assertFalse($styles->doUse());

        // True
        $styles = new PanelParams(new Panel('key'));
        $styles->setWidth(400);
        $this->assertTrue($styles->doUse());
    }
}

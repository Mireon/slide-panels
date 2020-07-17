<?php

namespace Mireon\SlidePanels\Tests\Panels;

use Exception;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\PanelInterface;
use Mireon\SlidePanels\Panels\PanelParams;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Test for the panel styles.
 *
 * @covers \Mireon\SlidePanels\Panels\PanelParams
 */
class PanelParamsTest extends TestCase
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
        $params = new PanelParams($panel);
        $this->assertTrue($panel === $property->getValue($params));
    }

    /**
     * Test for the panel property and its methods.
     *
     * @covers \Mireon\SlidePanels\Panels\PanelParams::panel
     * @covers \Mireon\SlidePanels\Panels\PanelParams::setPanel
     * @covers \Mireon\SlidePanels\Panels\PanelParams::getPanel
     * @covers \Mireon\SlidePanels\Panels\PanelParams::hasPanel
     *
     * @return void
     *
     * @throws Exception
     */
    public function testPanelProperty(): void
    {
        // Initialize
        $params = new PanelParams();
        $this->assertNull($params->getPanel());
        $this->assertFalse($params->hasPanel());

        // PanelParams::panel()
        $params = (new PanelParams())->panel(new Panel('key'));
        $this->assertInstanceOf(PanelInterface::class, $params->getPanel());
        $this->assertTrue($params->hasPanel());

        // PanelParams::setPanel()
        $params = new PanelParams();
        $params->setPanel(new Panel('key'));
        $this->assertInstanceOf(PanelInterface::class, $params->getPanel());
        $this->assertTrue($params->hasPanel());
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
        $params = new PanelParams($panel);
        $this->assertSame(320, $params->getWidth());

        // PanelParams::width()
        $params = (new PanelParams($panel))->width(500);
        $this->assertSame(500, $params->getWidth());

        // PanelParams::setWidth()
        $params = new PanelParams($panel);
        $params->setWidth(400);
        $this->assertSame(400, $params->getWidth());
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
        $params = new PanelParams(new Panel('key'));
        $this->assertTrue($params->isValid());

        // Invalid
        $params = new PanelParams(new Panel());
        $this->assertFalse($params->isValid());
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
        $params = new PanelParams(new Panel('key'));
        $params->setWidth(320);
        $this->assertFalse($params->doUse());

        // True
        $params = new PanelParams(new Panel('key'));
        $params->setWidth(400);
        $this->assertTrue($params->doUse());
    }
}

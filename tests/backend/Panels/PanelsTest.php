<?php

namespace Mireon\SlidePanels\Tests\Panels;

use Exception;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\Panels;
use Mireon\SlidePanels\Widgets\Widgets;
use PHPUnit\Framework\TestCase;

/**
 * Test for panels container.
 *
 * @covers \Mireon\SlidePanels\Panels\Panels
 */
class PanelsTest extends TestCase
{
    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Panels\Panels::__construct
     *
     * @return void
     *
     * @throws Exception
     */
    public function testConstruct(): void
    {
        // Initialize
        $panels = new Panels();
        $this->assertIsArray($panels->getPanels());
        $this->assertEmpty($panels->getPanels());

        // Not empty
        $panels = new Panels([new Panel('red'), new Panel('black')]);
        $this->assertNotEmpty($panels->getPanels());
        $this->assertCount(2, $panels->getPanels());
    }

    /**
     * Test for the create method.
     *
     * @covers \Mireon\SlidePanels\Panels\Panels::create
     *
     * @return void
     *
     * @throws Exception
     */
    public function testCreate(): void
    {
        // Initialize
        $panels = Panels::create();
        $this->assertInstanceOf(Panels::class, $panels);
        $this->assertIsArray($panels->getPanels());
        $this->assertEmpty($panels->getPanels());
        $this->assertFalse($panels->hasPanels());

        // Not empty
        $panels = Panels::create([new Panel('red'), new Panel('black')]);
        $this->assertInstanceOf(Panels::class, $panels);
        $this->assertNotEmpty($panels->getPanels());
        $this->assertCount(2, $panels->getPanels());
        $this->assertTrue($panels->hasPanels());
    }

    /**
     * Test for the panels property and its methods.
     *
     * @covers \Mireon\SlidePanels\Panels\Panels::panels
     * @covers \Mireon\SlidePanels\Panels\Panels::setPanels
     * @covers \Mireon\SlidePanels\Panels\Panels::getPanels
     * @covers \Mireon\SlidePanels\Panels\Panels::hasPanels
     *
     * @return void
     *
     * @throws Exception
     */
    public function testPanelsProperty(): void
    {
        // Panels::panels()
        $panels = (new Panels())->panels([new Panel('red'), new Panel('black')]);
        $this->assertNotEmpty($panels->getPanels());
        $this->assertCount(2, $panels->getPanels());
        $this->assertTrue($panels->hasPanels());

        // Panels::setPanels()
        $panels = new Panels();
        $panels->setPanels([new Panel('red'), new Panel('black')]);
        $this->assertNotEmpty($panels->getPanels());
        $this->assertCount(2, $panels->getPanels());
        $this->assertTrue($panels->hasPanels());

        // Clear
        $panels->setPanels([]);
        $this->assertEmpty($panels->getPanels());
        $this->assertCount(0, $panels->getPanels());
        $this->assertFalse($panels->hasPanels());
    }

    /**
     * Test for the panels method.
     *
     * Catch an exception when entered a invalid panel.
     *
     * @covers \Mireon\SlidePanels\Panels\Panels::panels
     *
     * @return void
     *
     * @throws Exception
     */
    public function testPanelsException(): void
    {
        $this->expectException(Exception::class);
        (new Panels())->panels([new Panel()]);
    }

    /**
     * Test for the setPanel method.
     *
     * Catch an exception when entered a invalid panel.
     *
     * @covers \Mireon\SlidePanels\Panels\Panels::setPanels
     *
     * @return void
     *
     * @throws Exception
     */
    public function testSetPanelsException(): void
    {
        $this->expectException(Exception::class);
        (new Panels())->setPanels([new Panel()]);
    }

    /**
     * Test for the panel property and its method.
     *
     * @covers \Mireon\SlidePanels\Panels\Panels::panel
     * @covers \Mireon\SlidePanels\Panels\Panels::addPanel
     * @covers \Mireon\SlidePanels\Panels\Panels::hasPanel
     *
     * @return void
     *
     * @throws Exception
     */
    public function testPanelProperty(): void
    {
        // Initialize
        $panels = new Panels();
        $this->assertEmpty($panels->getPanels());
        $this->assertCount(0, $panels->getPanels());
        $this->assertFalse($panels->hasPanels());

        // Panels::panel()
        $panels = (new Panels())->panel(new Panel('red'));
        $this->assertNotEmpty($panels->getPanels());
        $this->assertCount(1, $panels->getPanels());
        $this->assertTrue($panels->hasPanel('red'));
        $this->assertInstanceOf(Panel::class, $panels->getPanel('red'));

        // Panels::setPanel()
        $panels = new Panels();
        $panels->addPanel(new Panel('black'));
        $this->assertNotEmpty($panels->getPanels());
        $this->assertCount(1, $panels->getPanels());
        $this->assertTrue($panels->hasPanel('black'));
        $this->assertInstanceOf(Panel::class, $panels->getPanel('black'));
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Panels\Panels::render
     *
     * @return void
     *
     * @throws Exception
     */
    public function testRender(): void
    {
        $this->assertIsString((new Panels())->render());
    }

    /**
     * Test for the reset method.
     *
     * @covers  \Mireon\SlidePanels\Panels\Panels::reset
     *
     * @return void
     *
     * @throws Exception
     */
    public function testReset(): void
    {
        // Initialize
        $panels = new Panels([new Panel('red'), new Panel('black')]);
        $this->assertCount(2, $panels->getPanels());

        // Reset
        $panels->reset();
        $this->assertCount(0, $panels->getPanels());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Panels\Panels::getIterator
     *
     * @return void
     *
     * @throws Exception
     */
    public function testGetIterator(): void
    {
        $this->assertIsIterable((new Panels())->getIterator());
    }
}

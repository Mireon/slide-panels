<?php

namespace Mireon\SlidePanels\Tests\State;

use Exception;
use Mireon\SlidePanels\Panels\Panels;
use Mireon\SlidePanels\Stage\Stage;
use PHPUnit\Framework\TestCase;

/**
 * Test for the stage.
 *
 * @covers \Mireon\SlidePanels\Stage\Stage
 */
class StateTest extends TestCase
{
    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Stage\Stage::__construct
     *
     * @return void
     *
     * @throws Exception
     */
    public function testConstruct(): void
    {
        // Without param
        $stage = new Stage();
        $this->assertNull($stage->getPanels());
        $this->assertFalse($stage->hasPanels());

        // Nullable
        $stage = new Stage(null);
        $this->assertNull($stage->getPanels());
        $this->assertFalse($stage->hasPanels());

        // With params
        $stage = new Stage(new Panels());
        $this->assertInstanceOf(Panels::class, $stage->getPanels());
        $this->assertTrue($stage->hasPanels());
    }

    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Stage\Stage::create
     *
     * @return void
     *
     * @throws Exception
     */
    public function testCreate(): void
    {
        // Without param
        $stage = Stage::create();
        $this->assertInstanceOf(Stage::class, $stage);
        $this->assertNull($stage->getPanels());
        $this->assertFalse($stage->hasPanels());

        // Nullable
        $stage = Stage::create(null);
        $this->assertInstanceOf(Stage::class, $stage);
        $this->assertNull($stage->getPanels());
        $this->assertFalse($stage->hasPanels());

        // With params
        $stage = Stage::create(new Panels());
        $this->assertInstanceOf(Stage::class, $stage);
        $this->assertInstanceOf(Panels::class, $stage->getPanels());
        $this->assertTrue($stage->hasPanels());
    }

    /**
     * Test for the panels property and its method.
     *
     * @covers \Mireon\SlidePanels\Stage\Stage::panels
     * @covers \Mireon\SlidePanels\Stage\Stage::setPanels
     * @covers \Mireon\SlidePanels\Stage\Stage::getPanels
     * @covers \Mireon\SlidePanels\Stage\Stage::hasPanels
     *
     * @return void
     *
     * @throws Exception
     */
    public function testPanelsProperty(): void
    {
        // State::panels()
        $stage = (new Stage())->panels(new Panels());
        $this->assertInstanceOf(Stage::class, $stage);
        $this->assertInstanceOf(Panels::class, $stage->getPanels());
        $this->assertTrue($stage->hasPanels());

        // With params
        $stage = new Stage();
        $stage->setPanels(new Panels());
        $this->assertInstanceOf(Panels::class, $stage->getPanels());
        $this->assertTrue($stage->hasPanels());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Stage\Stage::render
     *
     * @return void
     */
    public function testRender(): void
    {
        $this->assertIsString((new Stage())->render());
    }
}

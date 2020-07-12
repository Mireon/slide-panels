<?php

namespace Mireon\SlidePanels\Tests;

use Error;
use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\SlidePanels;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Mireon\SlidePanels\SlidePanels
 */
class SlidePanelsTest extends TestCase
{
    /**
     * @covers \Mireon\SlidePanels\SlidePanels::getInstance
     */
    public function testInstance(): void
    {
        $a = SlidePanels::getInstance();
        $b = SlidePanels::getInstance();

        $this->assertTrue($a === $b);
    }

    /**
     * @covers \Mireon\SlidePanels\SlidePanels::__construct
     */
    public function testConstruct(): void
    {
        $this->expectException(Error::class);

        new SlidePanels();
    }

    /**
     * @covers \Mireon\SlidePanels\SlidePanels::__clone
     */
    public function testClone(): void
    {
        $this->expectException(Error::class);

        clone SlidePanels::getInstance();
    }

    /**
     * @covers \Mireon\SlidePanels\SlidePanels::__wakeup
     */
    public function testWakeup(): void
    {
        $this->expectException(Exception::class);

        unserialize(serialize(SlidePanels::getInstance()));
    }

    /**
     * @covers \Mireon\SlidePanels\SlidePanels::__unserialize
     */
    public function testUnserialize(): void
    {
        $this->expectException(Exception::class);

        unserialize(serialize(SlidePanels::getInstance()));
    }

    /**
     * @covers \Mireon\SlidePanels\SlidePanels::getDesigner
     */
    public function testDesigner(): void
    {
        $a = SlidePanels::getDesigner();
        $b = SlidePanels::getDesigner();

        $this->assertTrue($a === $b);
        $this->assertInstanceOf(Designer::class, $a);
    }

    /**
     * @covers \Mireon\SlidePanels\SlidePanels::render
     */
    public function testRender(): void
    {
        $this->assertIsString(SlidePanels::getInstance()->render());
    }
}

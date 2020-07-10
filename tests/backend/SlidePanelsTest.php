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
     * @covers \Mireon\SlidePanels\SlidePanels::instance
     */
    public function testInstance(): void
    {
        $a = SlidePanels::instance();
        $b = SlidePanels::instance();

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

        clone SlidePanels::instance();
    }

    /**
     * @covers \Mireon\SlidePanels\SlidePanels::__wakeup
     */
    public function testWakeup(): void
    {
        $this->expectException(Exception::class);

        unserialize(serialize(SlidePanels::instance()));
    }

    /**
     * @covers \Mireon\SlidePanels\SlidePanels::__unserialize
     */
    public function testUnserialize(): void
    {
        $this->expectException(Exception::class);

        unserialize(serialize(SlidePanels::instance()));
    }

    /**
     * @covers \Mireon\SlidePanels\SlidePanels::designer
     */
    public function testDesigner(): void
    {
        $a = SlidePanels::designer();
        $b = SlidePanels::designer();

        $this->assertTrue($a === $b);
        $this->assertInstanceOf(Designer::class, $a);
    }

    /**
     * @covers \Mireon\SlidePanels\SlidePanels::render
     */
    public function testRender(): void
    {
        $this->assertIsString(SlidePanels::instance()->render());
    }
}

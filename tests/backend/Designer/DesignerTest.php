<?php

namespace Mireon\SlidePanels\Tests\Designer;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Designer\FactoryInterface;
use Mireon\SlidePanels\Panels\Panel;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * @covers \Mireon\SlidePanels\Designer\Designer
 */
class DesignerTest extends TestCase
{
    /**
     * @covers \Mireon\SlidePanels\Designer\Designer::panel
     */
    public function testPanel_1(): void
    {
        $this->expectException(Exception::class);

        (new Designer())->panel('');
    }

    /**
     * @covers \Mireon\SlidePanels\Designer\Designer::panel
     */
    public function testPanel_2(): void
    {
        $this->assertInstanceOf(Panel::class, (new Designer())->panel('key'));
    }

    /**
     * @covers \Mireon\SlidePanels\Designer\Designer::factory
     */
    public function testFactory_1(): void
    {
        $this->expectException(Exception::class);

        (new Designer())->factory(false);
        (new Designer())->factory(0);
        (new Designer())->factory(1.0);
    }

    /**
     * @covers \Mireon\SlidePanels\Designer\Designer::factory
     */
    public function testFactory_2(): void
    {
        $this->expectException(Exception::class);

        (new Designer())->factory('class');
    }

    /**
     * @covers \Mireon\SlidePanels\Designer\Designer::factory
     */
    public function testFactory_3(): void
    {
        $this->expectException(Exception::class);

        (new Designer())->factory(Designer::class);
    }

    /**
     * @covers \Mireon\SlidePanels\Designer\Designer::factory
     */
    public function testFactory_4(): void
    {
        $property = (new ReflectionClass(Designer::class))->getProperty('factories');
        $property->setAccessible(true);

        $designer = new Designer();

        $this->assertIsArray($property->getValue($designer));
        $this->assertEmpty($property->getValue($designer));

        $designer = new Designer();
        $designer->factory($this->getFactory());

        $this->assertNotEmpty($property->getValue($designer));
    }

    /**
     * @covers \Mireon\SlidePanels\Designer\Designer::render
     */
    public function testRender_1(): void
    {
        $designer = new Designer();
        $designer->factory($this->getFactory());

        $this->assertIsString($designer->render());
    }

    /**
     * @return FactoryInterface
     */
    private function getFactory(): FactoryInterface
    {
        return new class implements FactoryInterface {
            public function doMake(): bool { return true; }
            public function make(Designer $designer): void {}
        };
    }
}

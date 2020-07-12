<?php

namespace Mireon\SlidePanels\Tests\Designer;

use Exception;
use Mireon\SlidePanels\Designer\Designer;
use Mireon\SlidePanels\Designer\DesignerInterface;
use Mireon\SlidePanels\Designer\PanelFactoryInterface;
use Mireon\SlidePanels\Panels\Panel;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;

/**
 * Test for the panel designer.
 *
 * @covers \Mireon\SlidePanels\Designer\Designer
 */
class DesignerTest extends TestCase
{
    /**
     * Test for the panel method.
     *
     * Catch an exception when entered an empty panel key.
     *
     * @covers \Mireon\SlidePanels\Designer\Designer::getPanel
     *
     * @return void
     *
     * @throws Exception
     */
    public function testPanelException_1(): void
    {
        $this->expectException(Exception::class);
        (new Designer())->getPanel('');
    }

    /**
     * Test for the panel method.
     *
     * @covers \Mireon\SlidePanels\Designer\Designer::getPanel
     *
     * @return void
     *
     * @throws Exception
     */
    public function testPanelException_2(): void
    {
        $this->assertInstanceOf(Panel::class, (new Designer())->getPanel('key'));
    }

    /**
     * Test for the factory method.
     *
     * Catch an exception when entered an invalid factory entity.
     *
     * @covers \Mireon\SlidePanels\Designer\Designer::factory
     *
     * @return void
     *
     * @throws Exception
     */
    public function testFactoryException_1(): void
    {
        $this->expectException(Exception::class);
        (new Designer())->factory(false);
        (new Designer())->factory(0);
        (new Designer())->factory(1.0);
    }

    /**
     * Test for the factory method.
     *
     * Catch an exception when entered a nonexistent factory class.
     *
     * @covers \Mireon\SlidePanels\Designer\Designer::factory
     *
     * @return void
     *
     * @throws Exception
     */
    public function testFactoryException_2(): void
    {
        $this->expectException(Exception::class);
        (new Designer())->factory('class');
    }

    /**
     * Test for the factory method.
     *
     * Catch an exception when entered a factory class with a non-implemented factory interface.
     *
     * @covers \Mireon\SlidePanels\Designer\Designer::factory
     *
     * @return void
     *
     * @throws Exception
     */
    public function testFactoryException_3(): void
    {
        $this->expectException(Exception::class);
        (new Designer())->factory(Designer::class);
    }

    /**
     * Test for the factory method.
     *
     * @covers \Mireon\SlidePanels\Designer\Designer::factory
     *
     * @return void
     *
     * @throws ReflectionException
     */
    public function testFactory(): void
    {
        // Private factories property
        $property = (new ReflectionClass(Designer::class))->getProperty('factories');
        $property->setAccessible(true);

        // Initialize
        $designer = new Designer();
        $this->assertIsArray($property->getValue($designer));
        $this->assertEmpty($property->getValue($designer));

        // Designer::factory()
        $designer = new Designer();
        $designer->factory($this->getFactory());
        $this->assertNotEmpty($property->getValue($designer));
    }

    /**
     * Test for the factories method.
     *
     * @covers \Mireon\SlidePanels\Designer\Designer::factories
     *
     * @return void
     *
     * @throws ReflectionException
     */
    public function testFactories(): void
    {
        // Private factories property
        $property = (new ReflectionClass(Designer::class))->getProperty('factories');
        $property->setAccessible(true);

        // Initialize
        $designer = new Designer();
        $this->assertIsArray($property->getValue($designer));
        $this->assertEmpty($property->getValue($designer));

        // Designer::factory()
        $designer = new Designer();
        $designer->factories([$this->getFactory(), $this->getFactory2()]);
        $this->assertNotEmpty($property->getValue($designer));
        $this->assertSame(2, count($property->getValue($designer)));
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Designer\Designer::render
     *
     * @return void
     *
     * @throws Exception
     */
    public function testRender(): void
    {
        $designer = new Designer();
        $designer->factory($this->getFactory());

        $this->assertIsString($designer->render());
    }

    /**
     * Returns the test factory.
     *
     * @return PanelFactoryInterface
     */
    private function getFactory(): PanelFactoryInterface
    {
        return new class implements PanelFactoryInterface {
            public function doMake(): bool { return true; }
            public function make(DesignerInterface $designer): void {}
        };
    }

    /**
     * Returns the 2 test factory.
     *
     * @return PanelFactoryInterface
     */
    private function getFactory2(): PanelFactoryInterface
    {
        return new class implements PanelFactoryInterface {
            public function doMake(): bool { return true; }
            public function make(DesignerInterface $designer): void {}
        };
    }
}

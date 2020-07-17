<?php

namespace Mireon\SlidePanels\Tests;

use Error;
use Exception;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\Panels\PanelInterface;
use Mireon\SlidePanels\SlidePanels;
use Mireon\SlidePanels\SlidePanelsInterface;
use Mireon\SlidePanels\Stage\StageInterface;
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
     * Test for the stage properties an its methods.
     *
     * @covers \Mireon\SlidePanels\SlidePanels::setStage
     * @covers \Mireon\SlidePanels\SlidePanels::getStage
     * @covers \Mireon\SlidePanels\SlidePanels::hasStage
     *
     * @return void
     */
    public function testStageProperty(): void
    {
        $slidePanels = SlidePanels::getInstance();
        $this->assertInstanceOf(StageInterface::class, $slidePanels->getStage());
        $this->assertTrue($slidePanels->hasStage());
    }

    /**
     * Test for the getPanel method.
     *
     * @covers \Mireon\SlidePanels\SlidePanels::getPanel
     *
     * @return void
     *
     * @throws Exception
     */
    public function testGetPanel(): void
    {
        $this->assertInstanceOf(PanelInterface::class, SlidePanels::getInstance()->getPanel('any'));
    }

    /**
     * Test for the getPanel method when trying to get a panel without a key.
     *
     * @covers \Mireon\SlidePanels\SlidePanels::getPanel
     *
     * @return void
     *
     * @throws Exception
     */
    public function testGetPanelException(): void
    {
        $this->expectException(Exception::class);

        SlidePanels::getInstance()->getPanel('');
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\SlidePanels::render
     *
     * @throws Exception
     */
    public function testRender(): void
    {
        SlidePanels::getInstance()->factory($this->createRandomPanelFactory());

        $this->assertIsString(SlidePanels::getInstance()->render());
    }

    /**
     * Test for the factories methods.
     *
     * @covers \Mireon\SlidePanels\SlidePanels::factories
     * @covers \Mireon\SlidePanels\SlidePanels::factory
     * @covers \Mireon\SlidePanels\SlidePanels::setFactories
     * @covers \Mireon\SlidePanels\SlidePanels::addFactories
     * @covers \Mireon\SlidePanels\SlidePanels::addFactory
     * @covers \Mireon\SlidePanels\SlidePanels::getFactories
     * @covers \Mireon\SlidePanels\SlidePanels::hasFactories
     * @covers \Mireon\SlidePanels\SlidePanels::removeFactories
     *
     * @return void
     *
     * @throws Exception
     */
    public function testFactoriesMethods(): void
    {
        // Initialize
        $slidePanels = SlidePanels::getInstance();
        $slidePanels->removeFactories();
        $this->assertIsArray($slidePanels->getFactories());
        $this->assertCount(0, $slidePanels->getFactories());
        $this->assertFalse($slidePanels->hasFactories());

        // SlidePanels::getInstance()->factories([], true)
        $slidePanels = SlidePanels::getInstance();
        $slidePanels->factories([$this->createRandomPanelFactory(), $this->createRandomPanelFactory()], true);
        $this->assertCount(2, $slidePanels->getFactories());
        $this->assertTrue($slidePanels->hasFactories());

        // SlidePanels::getInstance()->factories([], false)
        $slidePanels->factories([$this->createRandomPanelFactory()], false);
        $this->assertCount(3, $slidePanels->getFactories());

        // SlidePanels::getInstance()->removeFactories()
        $slidePanels->removeFactories();
        $this->assertCount(0, $slidePanels->getFactories());

        // SlidePanels::getInstance()->setFactories()
        $slidePanels = SlidePanels::getInstance();
        $slidePanels->setFactories([$this->createRandomPanelFactory(), $this->createRandomPanelFactory()]);
        $this->assertCount(2, $slidePanels->getFactories());

        // SlidePanels::getInstance()->addFactories()
        $slidePanels->factories([$this->createRandomPanelFactory()], false);
        $this->assertCount(3, $slidePanels->getFactories());

        // SlidePanels::getInstance()->factory()
        $slidePanels->factory($this->createRandomPanelFactory());
        $this->assertCount(4, $slidePanels->getFactories());

        // SlidePanels::getInstance()->addFactory()
        $this->assertNull($slidePanels->getFactory(get_class($this->createStaticPanelFactory())));
        $slidePanels->addFactory($this->createStaticPanelFactory());
        $this->assertInstanceOf(PanelFactoryInterface::class, $slidePanels->getFactory(get_class($this->createStaticPanelFactory())));

        // SlidePanels::getInstance()->removeFactories()
        $slidePanels->removeFactories();
        $this->assertCount(0, $slidePanels->getFactories());
    }

    /**
     * Test for the createFactory method exception when pass an invalid type of factory.
     *
     * @covers \Mireon\SlidePanels\SlidePanels::createFactory
     *
     * @throws Exception
     */
    public function testCreateFactoryException_1(): void
    {
        $this->expectException(Exception::class);

        SlidePanels::getInstance()->createFactory(123);
    }

    /**
     * Test for the createFactory method exception when pass a factory doesn't implement interface.
     *
     * @covers \Mireon\SlidePanels\SlidePanels::createFactory
     *
     * @throws Exception
     */
    public function testCreateFactoryException_2(): void
    {
        $this->expectException(Exception::class);

        SlidePanels::getInstance()->createFactory(new class {});
    }

    /**
     * Test for the createFactory method.
     *
     * @covers \Mireon\SlidePanels\SlidePanels::createFactoryFromString
     *
     * @throws Exception
     */
    public function testCreateFactory(): void
    {
        $factory = SlidePanels::getInstance()->createFactory('AccountFactory');
        $this->assertInstanceOf(PanelFactoryInterface::class, $factory);
    }

    /**
     * Test for the createFactory method exception when pass a class name to a non-existent factory.
     *
     * @covers \Mireon\SlidePanels\SlidePanels::createFactoryFromString
     *
     * @throws Exception
     */
    public function testCreateFactoryFromStringException(): void
    {
        $this->expectException(Error::class);

        SlidePanels::getInstance()->createFactoryFromString('className');
    }

    /**
     * Test for the createFactoryFromString method.
     *
     * @covers \Mireon\SlidePanels\SlidePanels::createFactoryFromString
     *
     * @throws Exception
     */
    public function testCreateFactoryFromString(): void
    {
        $factory = SlidePanels::getInstance()->createFactoryFromString('AccountFactory');
        $this->assertInstanceOf(PanelFactoryInterface::class, $factory);
    }

    /**
     * Creates a random panel factory.
     *
     * @return PanelFactoryInterface
     */
    private function createRandomPanelFactory(): PanelFactoryInterface
    {
        $factory = $this->getMockBuilder(PanelFactoryInterface::class)
            ->setMockClassName('PanelFactoryInterface_' . rand())
            ->getMock();

        $factory->method('doMake')->willReturn(true);

        return $factory;
    }

    /**
     * Creates a static panel factory.
     *
     * @return PanelFactoryInterface
     */
    private function createStaticPanelFactory(): PanelFactoryInterface
    {
        $factory = $this->getMockBuilder(PanelFactoryInterface::class)
            ->setMockClassName('AccountFactory')
            ->getMock();
        $factory->method('doMake')->willReturn(true);

        return $factory;
    }
}

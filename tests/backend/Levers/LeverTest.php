<?php

namespace Mireon\SlidePanels\Tests\Levers;

use Mireon\SlidePanels\Levers\Lever;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Mireon\SlidePanels\Levers\Lever
 */
class LeverTest extends TestCase
{
    /**
     * @covers \Mireon\SlidePanels\Levers\Lever::__construct
     */
    public function testConstruct(): void
    {
        $lever = new Lever();

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        $lever = new Lever(null, null);

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        $lever = new Lever('text', 'panel', Lever::HIDE);

        $this->assertSame('text', $lever->getText());
        $this->assertSame('panel', $lever->getPanel());
        $this->assertSame(Lever::HIDE, $lever->getType());
    }

    /**
     * @covers \Mireon\SlidePanels\Levers\Lever::create
     */
    public function testCreate(): void
    {
        $lever = Lever::create();

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        $lever = Lever::create(null, null);

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        $lever = Lever::create('text', 'panel', Lever::HIDE);

        $this->assertSame('text', $lever->getText());
        $this->assertSame('panel', $lever->getPanel());
        $this->assertSame(Lever::HIDE, $lever->getType());
    }

    /**
     * @covers \Mireon\SlidePanels\Levers\Lever::show
     */
    public function testShow(): void
    {
        $lever = Lever::show();

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());

        $lever = Lever::show(null, null);

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        $lever = Lever::show('text', 'panel');

        $this->assertSame('text', $lever->getText());
        $this->assertSame('panel', $lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());
    }

    /**
     * @covers \Mireon\SlidePanels\Levers\Lever::show
     */
    public function testHide(): void
    {
        $lever = Lever::hide();

        $this->assertNull($lever->getText());

        $lever = Lever::hide(null);

        $this->assertNull($lever->getText());
        $this->assertSame(Lever::HIDE, $lever->getType());

        $lever = Lever::hide('text');

        $this->assertSame('text', $lever->getText());
        $this->assertSame(Lever::HIDE, $lever->getType());
    }

    /**
     * @return array
     */
    public function providerText(): array
    {
        return [
            'Nullable' => [ null, null, false ],
            'Empty' => [ '', null, false ],
            'Valid' => [ 'text', 'text', true ],
        ];
    }

    /**
     * @covers \Mireon\SlidePanels\Levers\Lever::text
     * @covers \Mireon\SlidePanels\Levers\Lever::setText
     * @covers \Mireon\SlidePanels\Levers\Lever::getText
     * @covers \Mireon\SlidePanels\Levers\Lever::hasText
     *
     * @dataProvider providerText
     *
     * @param string|null $passed
     * @param string|null $expected
     * @param bool $has
     */
    public function testText(?string $passed, ?string $expected, bool $has): void
    {
        $lever = Lever::create()->text($passed);

        $this->assertSame($expected, $lever->getText());
        $this->assertSame($has, $lever->hasText());

        $lever = new Lever();
        $lever->setText($passed);

        $this->assertSame($expected, $lever->getText());
        $this->assertSame($has, $lever->hasText());
    }

    /**
     * @return array
     */
    public function providerPanel(): array
    {
        return [
            'Nullable' => [ null, null, false ],
            'Empty' => [ '', null, false ],
            'Valid' => [ 'panel', 'panel', true ],
        ];
    }

    /**
     * @covers \Mireon\SlidePanels\Levers\Lever::panel
     * @covers \Mireon\SlidePanels\Levers\Lever::setPanel
     * @covers \Mireon\SlidePanels\Levers\Lever::getPanel
     * @covers \Mireon\SlidePanels\Levers\Lever::hasPanel
     *
     * @dataProvider providerPanel
     *
     * @param string|null $passed
     * @param string|null $expected
     * @param bool $has
     */
    public function testPanel(?string $passed, ?string $expected, bool $has): void
    {
        $lever = Lever::create()->panel($passed);

        $this->assertSame($expected, $lever->getPanel());
        $this->assertSame($has, $lever->hasPanel());

        $lever = new Lever();
        $lever->setPanel($passed);

        $this->assertSame($expected, $lever->getPanel());
        $this->assertSame($has, $lever->hasPanel());
    }

    /**
     * @return array
     */
    public function providerType(): array
    {
        return [
            'Empty' => [ '', Lever::SHOW ],
            'Valid 1' => [ Lever::SHOW, Lever::SHOW ],
            'Valid 2' => [ Lever::HIDE, Lever::HIDE ],
        ];
    }

    /**
     * @covers \Mireon\SlidePanels\Levers\Lever::type
     * @covers \Mireon\SlidePanels\Levers\Lever::setType
     * @covers \Mireon\SlidePanels\Levers\Lever::getType
     *
     * @dataProvider providerType
     *
     * @param string|null $passed
     * @param string|null $expected
     */
    public function testType(?string $passed, ?string $expected): void
    {
        $lever = Lever::create()->type($passed);

        $this->assertSame($expected, $lever->getType());

        $lever = new Lever();
        $lever->setType($passed);

        $this->assertSame($expected, $lever->getType());
    }

    /**
     * @covers \Mireon\SlidePanels\Levers\Lever::isValid
     */
    public function testIsValidShow(): void
    {
        $lever = new Lever();
        $lever->setType(Lever::SHOW);

        $this->assertFalse($lever->isValid());

        $lever = new Lever();
        $lever->setType(Lever::SHOW);
        $lever->setPanel('panel');

        $this->assertTrue($lever->isValid());
    }

    /**
     * @covers \Mireon\SlidePanels\Levers\Lever::isValid
     */
    public function testIsValidHide(): void
    {
        $lever = new Lever();
        $lever->setType(Lever::HIDE);

        $this->assertTrue($lever->isValid());
    }

    /**
     * @covers \Mireon\SlidePanels\Levers\Lever::render
     */
    public function testRender(): void
    {
        $this->assertIsString((new Lever())->render());
    }
}

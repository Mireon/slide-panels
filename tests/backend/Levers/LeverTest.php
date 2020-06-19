<?php

namespace Mireon\SlidePanels\Tests\Levers;

use Mireon\SlidePanels\Levers\Lever;
use PHPUnit\Framework\TestCase;

/**
 * Test a lever.
 *
 * @covers \Mireon\SlidePanels\Levers\Lever
 */
class LeverTest extends TestCase
{
    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Levers\Lever::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        // Without params
        $lever = new Lever();

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        // Nullable
        $lever = new Lever(null, null, null);

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        // Empty
        $lever = new Lever('', '', '');

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        // Valid
        $lever = new Lever('text', 'panel', Lever::HIDE);

        $this->assertSame('text', $lever->getText());
        $this->assertSame('panel', $lever->getPanel());
        $this->assertSame(Lever::HIDE, $lever->getType());
    }

    /**
     * Test for the create method.
     *
     * @covers \Mireon\SlidePanels\Levers\Lever::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        // Without params
        $lever = Lever::create();

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        // Nullable
        $lever = Lever::create(null, null);

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        // Empty
        $lever = Lever::create('', '');

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        // Valid
        $lever = Lever::create('text', 'panel', Lever::HIDE);

        $this->assertSame('text', $lever->getText());
        $this->assertSame('panel', $lever->getPanel());
        $this->assertSame(Lever::HIDE, $lever->getType());
    }

    /**
     * Test for the show method.
     *
     * @covers \Mireon\SlidePanels\Levers\Lever::show
     *
     * @return void
     */
    public function testShow(): void
    {
        // Without params
        $lever = Lever::show();

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        // Nullable
        $lever = Lever::show(null, null);

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        // Empty
        $lever = Lever::show('', '');

        $this->assertNull($lever->getText());
        $this->assertNull($lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());

        // Valid
        $lever = Lever::show('text', 'panel');

        $this->assertSame('text', $lever->getText());
        $this->assertSame('panel', $lever->getPanel());
        $this->assertSame(Lever::SHOW, $lever->getType());
    }

    /**
     * Test for the hide method.
     *
     * @covers \Mireon\SlidePanels\Levers\Lever::hide
     *
     * @return void
     */
    public function testHide(): void
    {
        // Without param
        $lever = Lever::hide();

        $this->assertNull($lever->getText());
        $this->assertSame(Lever::HIDE, $lever->getType());

        // Nullable
        $lever = Lever::hide(null);

        $this->assertNull($lever->getText());
        $this->assertSame(Lever::HIDE, $lever->getType());

        // Empty
        $lever = Lever::hide('');

        $this->assertNull($lever->getText());
        $this->assertSame(Lever::HIDE, $lever->getType());

        // Valid
        $lever = Lever::hide('text');

        $this->assertSame('text', $lever->getText());
        $this->assertSame(Lever::HIDE, $lever->getType());
    }

    /**
     * Data for the text property.
     *
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
     * Test for the text property and its methods.
     *
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
     *
     * @return void
     */
    public function testText(?string $passed, ?string $expected, bool $has): void
    {
        // Lever::text()
        $lever = Lever::create()->text($passed);

        $this->assertSame($expected, $lever->getText());
        $this->assertSame($has, $lever->hasText());

        // Lever::setText()
        $lever = new Lever();
        $lever->setText($passed);

        $this->assertSame($expected, $lever->getText());
        $this->assertSame($has, $lever->hasText());
    }

    /**
     * Data for the panel property.
     *
     * @see testPanel()
     *
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
     * Test for the panel property and its methods.
     *
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
     *
     * @return void
     */
    public function testPanel(?string $passed, ?string $expected, bool $has): void
    {
        // Lever::panel()
        $lever = Lever::create()->panel($passed);

        $this->assertSame($expected, $lever->getPanel());
        $this->assertSame($has, $lever->hasPanel());

        // Lever::setPanel()
        $lever = new Lever();
        $lever->setPanel($passed);

        $this->assertSame($expected, $lever->getPanel());
        $this->assertSame($has, $lever->hasPanel());
    }

    /**
     * Data for the type property.
     *
     * @see testType()
     *
     * @return array
     */
    public function providerType(): array
    {
        return [
            'Empty' => [ '', Lever::SHOW ],
            'Invalid' => [ 'invalid', Lever::SHOW ],
            'Valid 1' => [ Lever::SHOW, Lever::SHOW ],
            'Valid 2' => [ Lever::HIDE, Lever::HIDE ],
        ];
    }

    /**
     * Test for the type property and its methods.
     *
     * @covers \Mireon\SlidePanels\Levers\Lever::type
     * @covers \Mireon\SlidePanels\Levers\Lever::setType
     * @covers \Mireon\SlidePanels\Levers\Lever::getType
     *
     * @dataProvider providerType
     *
     * @param string|null $passed
     * @param string|null $expected
     *
     * @return void
     */
    public function testType(?string $passed, ?string $expected): void
    {
        // Lever::type()
        $lever = Lever::create()->type($passed);

        $this->assertSame($expected, $lever->getType());

        // Lever::setType()
        $lever = new Lever();
        $lever->setType($passed);

        $this->assertSame($expected, $lever->getType());
    }

    /**
     * Test for the isValid method of the show lever.
     *
     * @covers \Mireon\SlidePanels\Levers\Lever::isValid
     *
     * @return void
     */
    public function testIsValidShow(): void
    {
        // Invalid
        $lever = new Lever();
        $lever->setType(Lever::SHOW);

        $this->assertFalse($lever->isValid());

        // Valid
        $lever = new Lever();
        $lever->setType(Lever::SHOW);
        $lever->setPanel('panel');

        $this->assertTrue($lever->isValid());
    }

    /**
     * Test for the isValid method of the hide lever.
     *
     * @covers \Mireon\SlidePanels\Levers\Lever::isValid
     *
     * @return void
     */
    public function testIsValidHide(): void
    {
        $lever = new Lever();
        $lever->setType(Lever::HIDE);

        $this->assertTrue($lever->isValid());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Levers\Lever::render
     *
     * @return void
     */
    public function testRender(): void
    {
        $this->assertIsString((new Lever())->render());
    }
}

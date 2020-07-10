<?php

namespace Mireon\SlidePanels\Tests\Widgets\Html;

use Mireon\SlidePanels\Widgets\Html\Html;
use PHPUnit\Framework\TestCase;

/**
 * Test for the HTML widget
 *
 * @covers \Mireon\SlidePanels\Widgets\Html\Html
 */
class HtmlTest extends TestCase
{
    /**
     * Test for the __construct method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Html\Html::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        // Without param
        $html = new Html();
        $this->assertFalse($html->hasHtml());
        $this->assertNull($html->getHtml());

        // Nullable
        $html = new Html(null);
        $this->assertFalse($html->hasHtml());
        $this->assertNull($html->getHtml());

        // With param
        $html = new Html('<span>html</span>');
        $this->assertTrue($html->hasHtml());
        $this->assertSame('<span>html</span>', $html->getHtml());
    }

    /**
     * Test for the create method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Html\Html::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        // Without param
        $html = Html::create();
        $this->assertInstanceOf(Html::class, $html);
        $this->assertFalse($html->hasHtml());
        $this->assertNull($html->getHtml());

        // Nullable
        $html = Html::create(null);
        $this->assertInstanceOf(Html::class, $html);
        $this->assertFalse($html->hasHtml());
        $this->assertNull($html->getHtml());

        // With param
        $html = Html::create('<span>html</span>');
        $this->assertInstanceOf(Html::class, $html);
        $this->assertTrue($html->hasHtml());
        $this->assertSame('<span>html</span>', $html->getHtml());
    }

    /**
     * Test for the html property and its methods.
     *
     * @covers \Mireon\SlidePanels\Widgets\Html\Html::html
     * @covers \Mireon\SlidePanels\Widgets\Html\Html::setHtml
     * @covers \Mireon\SlidePanels\Widgets\Html\Html::getHtml
     * @covers \Mireon\SlidePanels\Widgets\Html\Html::hasHtml
     *
     * @return void
     */
    public function testHtmlProperty(): void
    {
        // Html::html
        $html = (new Html())->html('html');
        $this->assertInstanceOf(Html::class, $html);
        $this->assertTrue($html->hasHtml());
        $this->assertSame('html', $html->getHtml());

        // Html::setHtml
        $html = new Html();
        $html->setHtml('html');
        $this->assertTrue($html->hasHtml());
        $this->assertSame('html', $html->getHtml());
    }

    /**
     * Test for the isValid method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Html\Html::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        // Invalid
        $html = new Html();
        $this->assertFalse($html->isValid());

        // Valid
        $html = new Html();
        $html->setHtml('text');
        $this->assertTrue($html->isValid());
    }

    /**
     * Test for the render method.
     *
     * @covers \Mireon\SlidePanels\Widgets\Html\Html::render
     *
     * @return void
     */
    public function testRender(): void
    {
        $this->assertIsString((new Html())->render());
    }
}

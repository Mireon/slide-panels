<?php

namespace Mireon\SlidePanels\Tests\Renderer;

use Mireon\SlidePanels\Levers\Lever;
use Mireon\SlidePanels\Renderer\Renderer;
use PHPUnit\Framework\TestCase;

/**
 * Test for the default renderer.
 */
class RendererTest extends TestCase
{
    /**
     * Test for the render method.
     *
     * @return void
     */
    public function testRender(): void
    {
        $this->assertIsString(Renderer::render('levers/hide', ['lever' => Lever::hide()]));
    }
}

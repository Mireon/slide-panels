<?php

namespace Mireon\SlidePanels\Tests\Helpers;

use Mireon\SlidePanels\Helpers\Path;
use PHPUnit\Framework\TestCase;

/**
 * Test the path utility.
 *
 * @covers \Mireon\SlidePanels\Helpers\Path
 */
class PathTest extends TestCase
{
    /**
     * Test for the resources method.
     *
     * @covers \Mireon\SlidePanels\Helpers\Path::resources
     *
     * @return void
     */
    public function testResources(): void
    {
        $resources = Path::resources();
        $extra = 'extra';

        $this->assertIsString($resources);
        $this->assertSame("$resources/$extra", Path::resources($extra));
    }

    /**
     * Test for the views method.
     *
     * @covers \Mireon\SlidePanels\Helpers\Path::views
     *
     * @return void
     */
    public function testViews(): void
    {
        $resources = Path::resources();
        $views = Path::views('view');

        $this->assertIsString($views);
        $this->assertSame("$resources/views/view.php" , $views);
    }
}

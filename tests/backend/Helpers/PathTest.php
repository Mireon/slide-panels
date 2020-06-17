<?php

namespace Mireon\SlidePanels\Tests\Helpers;

use Mireon\SlidePanels\Helpers\Path;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Mireon\SlidePanels\Helpers\Path
 */
class PathTest extends TestCase
{
    /**
     * @covers \Mireon\SlidePanels\Helpers\Path::resources
     */
    public function testResources(): void
    {
        $resources = Path::resources();
        $extra = 'extra';

        $this->assertIsString($resources);
        $this->assertSame("$resources/$extra", Path::resources($extra));
    }

    /**
     * @covers \Mireon\SlidePanels\Helpers\Path::views
     */
    public function testViews(): void
    {
        $resources = Path::resources();
        $views = Path::views('view');

        $this->assertIsString($views);
        $this->assertSame("$resources/views/view.php" , $views);
    }
}

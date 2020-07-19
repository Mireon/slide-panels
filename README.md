# The SlidePanels

[![PHP](https://img.shields.io/badge/php-7.4-green.svg?color=red)](https://github.com/Mireon/yandex-turbo)
[![Size](https://img.shields.io/github/repo-size/mireon/slide-panels?color=green)](https://github.com/Mireon/yandex-turbo)
[![License](https://img.shields.io/github/license/mireon/slide-panels?color=green)](https://github.com/Mireon/yandex-turbo)
[![Release](https://img.shields.io/github/v/release/mireon/slide-panels?color=red)](https://github.com/Mireon/yandex-turbo)

## Install

Install via [Composer](https://getcomposer.org/):

```sh
$ composer require mireon/slide-panels
```

## Display

#### CSS and JS

The resource files are located in the folders:
- `vendor/mireon/slide-panels/resources/assets/styles/slide-panels.min.css`
- `vendor/mireon/slide-panels/resources/assets/scripts/slide-panels.min.js`

Copy these files to the public directory and add them to a page.

```html
<html>
    <head>
        <link href="https://example.com/css/slide-panels.min.css" rel="stylesheet" type="text/css">
        <script src="https://example.com/css/js/slide-panels.min.js"></script>    
    </head>
</html>
```

#### HTML

To add panels, you must add the "SlidePanels" instance to a page. Add the instance to the end of the body tag.

```html
<html>
    <body>
        <?= Mireon\SlidePanels\SlidePanels::getInstance(); ?>
    </body>
</html>
```

## Code

#### Add a panel via the "SlidePanel" instance.

Add code like the following where it will executed.

```php
<?php

use Mireon\SlidePanels\SlidePanels;
use Mireon\SlidePanels\Widgets\Header\Header;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

$panel = SlidePanels::getInstance()
    ->panel('main')
    ->widget(Header::create('Main menu', 'fa fa-bars'))
    ->widget(Menu::create()
        ->key('main-menu')
        ->item(Item::create('Catalog', 'https://example.com/catalog'))
        ->item(Item::create('News', 'https://example.com/news'))
        ->item(Item::create('Services', 'https://example.com/services'))
        ->item(Item::create('Forum', 'https://example.com/forum'))
        ->item(Item::create('Profile', 'https://example.com/profile')));
```

#### Add a panel via a panel factory.

You can find more examples of panel factories in the path `vendor/mireon/slide-panels/backend/Examples`.

```php
<?php

use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\SlidePanelsInterface;
use Mireon\SlidePanels\Widgets\Header\Header;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

class MainMenu implements PanelFactoryInterface
{
    /**
     * If true is returned, the "make" method will be called.
     * 
     * @return bool 
     */
    public function doMake(): bool
    {
        return true;
    }

    /**
     * Make panels and add widgets.
     *
     * @param SlidePanelsInterface $slidePanels
     *   The "SlidePanel" instance.
     *
     * @throws Exception
     */
    public function make(SlidePanelsInterface $slidePanels): void
    {
        $slidePanels
            ->panel('main')
            ->widget(Header::create('Main menu', 'fa fa-bars'))
            ->widget(Menu::create()
                ->key('main-menu')
                ->item(Item::create('Catalog', 'https://example.com/catalog'))
                ->item(Item::create('News', 'https://example.com/news'))
                ->item(Item::create('Services', 'https://example.com/services'))
                ->item(Item::create('Forum', 'https://example.com/forum'))
                ->item(Item::create('Profile', 'https://example.com/profile')));
    }
}
```

#### Add a lever to open a panel.

To open the panel, you need to add a lever to a page. A lever is any HTML tag that has required attributes. These are "data-element" with the "lever" value and "data-target" with a panel key. 

A simple way to create a lever is to use the "Lever" class, for example: 

```html
<html>
    <body>
        <?= Mireon\SlidePanels\Levers\Lever::show('Main', 'main'); ?>
    </body>
</html>
```

## Tests

```sh
$ composer test
```

## License

Released under the [MIT License](https://opensource.org/licenses/MIT).

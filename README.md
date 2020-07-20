# The SlidePanels

[![PHP](https://img.shields.io/badge/php-7.4-green.svg?color=red)](https://github.com/Mireon/yandex-turbo)
[![Size](https://img.shields.io/github/repo-size/mireon/slide-panels?color=green)](https://github.com/Mireon/yandex-turbo)
[![License](https://img.shields.io/github/license/mireon/slide-panels?color=green)](https://github.com/Mireon/yandex-turbo)
[![Release](https://img.shields.io/github/v/release/mireon/slide-panels?color=red)](https://github.com/Mireon/yandex-turbo)

![The presentation](docs/movies/presentation.gif?raw=true)

The code see in the file: [vendor/mireon/slide-panels/docs/examples/all.php](https://github.com/Mireon/slide-panels/tree/master/docs/examples/all.php)

## Install

Install via [Composer](https://getcomposer.org/):

```sh
$ composer require mireon/slide-panels
```

## Display

#### CSS and JS

The resource files are located in the following paths:
- `vendor/mireon/slide-panels/resources/assets/styles/slide-panels.min.css`
- `vendor/mireon/slide-panels/resources/assets/scripts/slide-panels.min.js`

Copy these files to your the public directory and add them to a page.

```html
<html>
    <head>
        <link href="https://example.com/css/slide-panels.min.css" rel="stylesheet" type="text/css">
        <script src="https://example.com/js/slide-panels.min.js"></script>    
    </head>
</html>
```

#### HTML

To display panels, you must print the "SlidePanels" instance on a page. Do this at the end of the body tag.

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

use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\SlidePanels;
use Mireon\SlidePanels\Widgets\Header\Header;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

SlidePanels::getInstance()
    ->panel('main')
    ->width(320)
    ->side(Panel::LEFT)
    ->widget(Header::create('Main menu', 'fa fa-bars'))
    ->widget(Menu::create()
        ->key('main-menu')
        ->item(Item::create('Catalog', 'https://example.com/catalog'))
        ->item(Item::create('News', 'https://example.com/news'))
        ->item(Item::create('Services', 'https://example.com/services'))
        ->item(Item::create('Forum', 'https://example.com/forum'))
        ->item(Item::create('Profile', 'https://example.com/profile')));
```

#### Add a panel via a panel factory

You can find more of panel factories in the path [vendor/mireon/slide-panels/backend/Examples](https://github.com/Mireon/slide-panels/tree/master/src/backend/Examples).

Create a class that implements the "PanelFactoryInterface" interface.

```php
<?php

use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\SlidePanelsInterface;
use Mireon\SlidePanels\Widgets\Header\Header;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

class MainMenu implements PanelFactoryInterface
{
    /**
     * If true is returned, the "make" method will be called
     * and all dependent factories will be added.
     * 
     * @return bool 
     */
    public function doMake(): bool
    {
        return true;
    }

    /**
     * Returns a list of dependent factories.
     * 
     * @return PanelFactoryInterface[]|string[]
     */
    public function getFactories(): array
    {
        return [];
    }

    /**
     * Make panels and add widgets.
     *
     * @param SlidePanelsInterface $slidePanels
     *   The "SlidePanel" instance.
     *
     * @return void
     * 
     * @throws Exception
     */
    public function make(SlidePanelsInterface $slidePanels): void
    {
        $slidePanels
            ->panel('main')
            ->width(960)
            ->side(Panel::RIGHT)
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

And add it to the "SlidePanels" instance.

```php
<?php

use Mireon\SlidePanels\SlidePanels;

SlidePanels::getInstance()->factory(MainMenu::class);
```

#### Add a lever to open a panel.

To open the panel, you need to add a lever to a page. A lever is any HTML tag that has required attributes. These are "data-element" with the "lever" value and "data-target" with a panel key. 

```html
<html>
    <body>
        <a href="#" data-element="lever" data-action="show" data-target="main">Main</a>
    </body>
</html>
```

A simple way to create a lever is to use the "Lever" class, for example: 

```html
<html>
    <body>
        <?= Mireon\SlidePanels\Levers\Lever::show('Main', 'main'); ?>
    </body>
</html>
```

## Widgets

Few widgets supplied in a box: Header, Menu, Html, Close. You can create your own widgets and add them to a panel. To create a widget, you must create a class that implements the "WidgetInterface" interface.

#### Header

A HTML element containing an icon and text. A header can be small or big.

![The "Header" widget](docs/images/widgets-header.jpg?raw=true)

```php
<?php

use Mireon\SlidePanels\Widgets\Header\Header;

Header::create()
    ->key('account-header')
    ->weight(10)
    ->icon('fa fa-user')
    ->text('Account')
    ->size(Header::BIG);
```

#### Menu

A vertical list of items.

![The "Menu" widget](docs/images/widgets-menu.jpg?raw=true)

```php
<?php

use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

Menu::create()
    ->key('main-menu')
    ->weight(10)
    ->items([
        Item::create('Catalog', 'https://example.com/catalog', 'fa fa-th'),
        Item::create('News', 'https://example.com/News', 'fa fa-clock-o'),
        Item::create('Services', 'https://example.com/services', 'fa fa-list-alt'),
    ])
    ->item(Item::create('Forum', 'https://example.com/forum', 'fa fa-headphones'))
    ->item(Item::create('Profile', 'https://example.com/profile', 'fa fa-user-o'));
```

#### Close

A lever to close a panel.

![The "Close" widget](docs/images/widgets-close.jpg?raw=true)

```php
<?php

use Mireon\SlidePanels\Widgets\Close\Close;

Close::create('Close', 'fa fa-close')
    ->key('panel-close')
    ->weight(-10)
    ->text('Close')
    ->icon('fa fa-close');
```

#### Html

Output the raw HTML.

![The "Html" widget](docs/images/widgets-html.jpg?raw=true)

```php
<?php

use Mireon\SlidePanels\Widgets\Html\Html;

Html::create()
    ->key('catalog-caption')
    ->weight(5)
    ->html('<span style="padding: 10px; color: #ababab;">The main catalog!</span>');
```

## Examples

- [vendor/mireon/slide-panels/backend/Examples](https://github.com/Mireon/slide-panels/tree/master/src/backend/Examples)
- [vendor/mireon/slide-panels/docs/examples/all.php](https://github.com/Mireon/slide-panels/tree/master/docs/examples/all.php)

## Tests

```sh
$ composer test
```

## License

Released under the [MIT License](https://opensource.org/licenses/MIT).

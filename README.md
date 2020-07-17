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
 - vendor/mireon/slide-panels/resources/assets/styles/slide-panels.min.css
 - vendor/mireon/slide-panels/resources/assets/scripts/slide-panels.min.js
 
Copy them to the public directory and add them to a page.

```html
<html>
    <head>
        <link href="https://example.com/css/slide-panels.min.css" rel="stylesheet" type="text/css">
        <script src="https://example.com/css/js/slide-panels.min.js"></script>    
    </head>
</html>
```

#### HTML

To add panels, you must add the "SlidePanels" instance to a page. Add an instance to the end of the body tag.

```phtml
<html>
    <body>
        <?= Mireon\SlidePanels\SlidePanels::getInstance(); ?>
    </body>
</html>
```
      
## Tests

```sh
$ composer test
```

## License

Released under the [MIT License](https://opensource.org/licenses/MIT).

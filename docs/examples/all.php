<?php

use Mireon\SlidePanels\Examples\Account\Account;
use Mireon\SlidePanels\Examples\Catalog\Catalog;
use Mireon\SlidePanels\Levers\Lever;
use Mireon\SlidePanels\SlidePanels;
use Mireon\SlidePanels\Widgets\Header\Header;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

require_once '../vendor/autoload.php'; // Attention!

SlidePanels::getInstance()
    ->factory(Account::class)
    ->factory(Catalog::class);

SlidePanels::getInstance()
    ->panel('menu')
    ->widget(Header::create('Main menu', 'fa fa-bars'))
    ->widget(Menu::create()
        ->key('main-menu')
        ->weight(10)
        ->item(Lever::create('Catalog', 'catalog'))
        ->item(Item::create('News', 'https://example.com/News', 'fa fa-clock-o'))
        ->item(Item::create('Services', 'https://example.com/services', 'fa fa-list-alt'))
        ->item(Item::create('Forum', 'https://example.com/forum', 'fa fa-headphones'))
        ->item(Item::create('Profile', 'https://example.com/profile', 'fa fa-user-o')));
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Attention, change the path to CSS and JS files! -->
    <link rel="stylesheet" href="https://example.com/css/slide-panels.min.css" type="text/css" />
    <script src="https://example.com/js/slide-panels.js"></script>
</head>
<body>
    <main>
        <ul style="margin: 0 auto; width: 250px;">
            <li><?= Lever::show('Account', 'account'); ?></li>
            <li><?= Lever::show('Catalog', 'catalog'); ?></li>
            <li><?= Lever::show('Menu', 'menu'); ?></li>
        </ul>
    </main>
    <?= SlidePanels::getInstance(); ?>
</body>
</html>

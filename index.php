<?php

use Discord\Discord;
use Discord\WebSockets\Event;

require_once(dirname(__DIR__) . '/vendor/autoload.php');

$bot = new Discord([
    'token' => '...',
]);

$bot->on(Event::READY, function (Discord $discord) {
    echo "Salut les reufs";
});

$bot->run();

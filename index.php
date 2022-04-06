<?php

use Discord\Discord;
use Discord\WebSockets\Event;
use Dotenv\Dotenv;
use Sti2d\Revisobot\App\Commands\Collection;
use Sti2d\Revisobot\App\Handler;

require_once(dirname(__FILE__) . '/vendor/autoload.php');

Dotenv::createImmutable(__DIR__)->load();

$bot = new Discord([
    'token' => $_ENV['TOKEN'],
]);

$bot->on('ready', function (Discord $discord) {
    echo "Salut les reufs \n";

    foreach (glob(__DIR__ . '/src/commands/*.php') as $filename) {
        require_once($filename);
    }

    $handler = new Handler($discord);
    
    Collection::each(function ($name, $command) use ($handler) {
        $handler->generateCommand($name);
    });
});

$bot->run();

<?php

use Discord\Builders\MessageBuilder;
use Discord\Parts\Interactions\Command\Option as CommandOption;
use Discord\Parts\Interactions\Interaction;
use Sti2d\Revisobot\App\Commands\Create as Command;
use Sti2d\Revisobot\App\Commands\Option;
use Sti2d\Revisobot\App\Commands\OptionChoice;

Command::new('maths', 'salut')
->setExec(function (Interaction $i) {
    $i->respondWithMessage(
        MessageBuilder::new()->setContent('Ceci est un test')
    );
})
->setIsSlash(true)
->setOptions(
    Option::new('a', 'a')->setType(CommandOption::STRING)->addChoices(
        OptionChoice::new('test', 'truc')
    ))
->setGuilds('773468731702640661', '781105165754433537');

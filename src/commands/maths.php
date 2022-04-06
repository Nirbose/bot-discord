<?php

use Discord\Builders\MessageBuilder;
use Discord\Parts\Interactions\Interaction;
use Sti2d\Revisobot\App\Commands\Create as Command;

Command::new('maths', 'salut')
->setExec(function (Interaction $i) {
    $i->respondWithMessage(
        MessageBuilder::new()->setContent('Ceci est un test')
    );
});

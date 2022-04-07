<?php

use Discord\Builders\MessageBuilder;
use Discord\Parts\Interactions\Command\Option as CommandOption;
use Discord\Parts\Interactions\Interaction;
use Sti2d\Revisobot\App\Commands\Create as Command;
use Sti2d\Revisobot\App\Commands\Option;
use Sti2d\Revisobot\App\Commands\OptionChoice;

Command::new('maths', 'Commande pour les chapitres de Maths')
->setExec(function (Interaction $i) {
    $i->respondWithMessage(
        MessageBuilder::new()->setContent('Ceci est un test')
    );
})
->setIsSlash(true)
->setOptions(
    Option::new('chapitres', 'Tout les chapitres de Maths')->setRequired(true)->setType(CommandOption::INTEGER)->addChoices(
        OptionChoice::new('Automatisme', 1),
        OptionChoice::new('Dérivée et primitive', 2),
        OptionChoice::new('Suites', 3),
        OptionChoice::new('Foncitons inverses', 4),
        OptionChoice::new('Fonctions exponentielle', 5),
        OptionChoice::new('Equation différentielle', 6),
        OptionChoice::new('Logarithme népérien', 7),
        OptionChoice::new('Probabilités conditionnelles', 8),
        OptionChoice::new('Nombre complexe', 9),
        OptionChoice::new('Les log10', 10),
    ))
->setGuilds('773468731702640661', '781105165754433537');

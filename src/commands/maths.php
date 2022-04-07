<?php

use Discord\Builders\MessageBuilder;
use Discord\Parts\Interactions\Command\Option as CommandOption;
use Discord\Parts\Interactions\Interaction;
use Sti2d\Revisobot\App\Commands\Create as Command;
use Sti2d\Revisobot\App\Commands\Option;
use Sti2d\Revisobot\App\Commands\OptionChoice;

Command::new('maths', 'Commande pour les chapitres de Maths')
->setExec(function (Interaction $i) {
    // All image link
    $images = [
        1 => "",
        2 => "https://cdn.discordapp.com/attachments/781105165754433540/961667602785108038/maths_2.png",
        3 => "https://cdn.discordapp.com/attachments/781105165754433540/961667603095511060/maths_3.png",
        4 => "",
        5 => "https://cdn.discordapp.com/attachments/781105165754433540/961667603619803286/maths_5.png",
        6 => "",
        7 => "https://cdn.discordapp.com/attachments/781105165754433540/961667603825295410/maths_7.png",
        8 => "",
        9 => "https://cdn.discordapp.com/attachments/781105165754433540/961667604030849104/maths_9.png",
        10 => "",
    ];

    $i->respondWithMessage(
        MessageBuilder::new()->setEmbeds([
            [
                'color' => hexdec("#5865F2"),
                'title' => 'Maths',
                'description' => 'Chapitre ' . $i->data->options->get('name', 'chapitres')->value,
                'image' => [
                    'url' => $images[$i->data->options->get('name', 'chapitres')->value],
                ],
            ],
        ])
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

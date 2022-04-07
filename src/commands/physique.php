<?php

use Discord\Builders\MessageBuilder;
use Discord\Parts\Interactions\Command\Option as CommandOption;
use Discord\Parts\Interactions\Interaction;
use Sti2d\Revisobot\App\Commands\Create as Command;
use Sti2d\Revisobot\App\Commands\Option;
use Sti2d\Revisobot\App\Commands\OptionChoice;

Command::new('physique', 'Commande pour les chapitres de Physique')
->setExec(function (Interaction $i) {
    $images = [
        1 => "",
        2 => "",
        3 => "",
        4 => "",
        5 => "",
        6 => "",
        7 => "",
        8 => "",
        9 => "",
        10 => "",
        11 => "",
        12 => "",
        13 => "",
        14 => [
            "https://cdn.discordapp.com/attachments/789880795334049813/961670437631303711/travail.force.png",
            "https://cdn.discordapp.com/attachments/789880795334049813/961670462801330247/travail.force.2.png"
        ],
    ];

    $image = $images[$i->data->options->get('name', 'chapitres')->value];

    if (is_array($image)) {
        $embeds = [
            [
                'color' => hexdec("#5865F2"),
                'title' => 'Physique',
                'description' => 'Chapitre ' . $i->data->options->get('name', 'chapitres')->value,
                'image' => [
                    'url' => $images[$i->data->options->get('name', 'chapitres')->value][0],
                ],
            ],
        ];

        for ($j = 1; $j < count($image); $j++) {
            $embeds[] = [
                'color' => hexdec("#5865F2"),
                'image' => [
                    'url' => $image[$j],
                ],
            ];
        }

        var_dump($embeds);

        $i->respondWithMessage(
            MessageBuilder::new()->setEmbeds($embeds)
        );
    } else {
        $i->respondWithMessage(
            MessageBuilder::new()->setEmbeds([
                [
                    'color' => hexdec("#5865F2"),
                    'title' => 'Physique',
                    'description' => 'Chapitre ' . $i->data->options->get('name', 'chapitres')->value,
                    'image' => [
                        'url' => $images[$i->data->options->get('name', 'chapitres')->value],
                    ],
                ],
            ])
        );
    }
})
->setIsSlash(true)
->setOptions(
    Option::new('chapitres', 'Tout les chapitres de Physique')->setRequired(true)->setType(CommandOption::INTEGER)->addChoices(
        OptionChoice::new('Automatisme', 1),
        OptionChoice::new('Energie solaire/transfert thermique', 2),
        OptionChoice::new('Combustion (bilan énergétique)', 3),
        OptionChoice::new('Oxydoréduction', 4),
        OptionChoice::new('Batterie au plomb', 5),
        OptionChoice::new('Décharge d\'accumulateur', 6),
        OptionChoice::new('Réaction acido/basique + le PH', 7),
        OptionChoice::new('Mouvement des forces/forces mecanique', 8),
        OptionChoice::new('Grandeur sinusoïdales', 9),
        OptionChoice::new('Transfert thermique', 10),
        OptionChoice::new('Ondes sonnores', 11),
        OptionChoice::new('Rappel des angles', 12),
        OptionChoice::new('Vitesse linéaire/vitesse angulaire', 13),
        OptionChoice::new('Travail des forces', 14),
    ))
->setGuilds('773468731702640661', '781105165754433537');

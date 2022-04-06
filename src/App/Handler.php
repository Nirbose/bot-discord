<?php

namespace Sti2d\Revisobot\App;

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\Parts\Interactions\Command\Command;
use Discord\Parts\Interactions\Interaction;
use Sti2d\Revisobot\App\Commands\Collection;

class Handler {

    private Discord $discord;

    /**
     * Constructor
     * 
     * @param Discord $discord
     */
    public function __construct(Discord $discord)
    {
        $this->discord = $discord;
    }

    /**
     * Handle message
     * 
     * @param Message|Interaction $message
     * @return void
     */
    public function handle($message)
    {
        if ($message instanceof Message) {
            $content = $message->content;

            // Command name
            $name = substr($content, 1, strpos($content, ' '));
        }

        if ($message instanceof Interaction) {
            $name = $message->data->name;
        }

        $this->generateCommand($name, $message);
    }

    public function generateCommand(string $name, $message = null)
    {
        $command = Collection::get($name);

        if (array_key_exists('isSlash', $command)) {
            $this->slashBuilder($command);
        }

        if ($command && !is_null($message)) {
            $command['exec']($message);
        }
    }

    public function slashBuilder(array $command): void
    {
        $builder = [
            'type' => array_key_exists('type', $command) ? $command['type'] : 1,
            'name' => $command['name'],
            'description' => $command['description'],
        ];

        if (array_key_exists('type', $command)) {
            $builder['options'] = array_key_exists('options', $command) ? $command['options'] : [];
        }

        $slash = new Command($this->discord, $builder);

        if (array_key_exists('guilds', $command)) {
            foreach ($command['guilds'] as $guild) {
                $guild = $this->discord->guilds->get('id', $guild);
                
                if (!is_null($guild)) {
                    $guild->commands->save($slash);
                }
            }
        } else {
            $this->discord->application->commands->save($slash);
        }
    }
    

}

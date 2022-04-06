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
     * @var Message|Interaction
     */
    private $message;

    /**
     * Constructor
     * 
     * @param Discord $discord
     * @param Message|Interaction $message
     */
    public function __construct(Discord $discord, $message)
    {
        $this->message = $message;
    }

    /**
     * Handle message
     * 
     * @return void
     */
    public function handle()
    {
        if ($this->message instanceof Message) {
            $content = $this->message->content;

            // Command name
            $name = substr($content, 1, strpos($content, ' '));
        }

        if ($this->message instanceof Interaction) {
            $name = $this->message->data->name;
        }

        $command = Collection::get($name);

        if (array_key_exists('isSlash', $command)) {
            $this->slashBuilder($command);
        }

        if ($command) {
            $command['exec']($this->message);
        }
    }

    public function slashBuilder(array $command): void
    {
        $builder = [
            'name' => $command['name'],
            'description' => $command['description'],
            'options' => array_key_exists('options', $command) ? $command['options'] : [],
        ];

        $slash = new Command($this->discord, $builder);

        if (array_key_exists('guilds', $command)) {
            foreach ($command['guilds'] as $guild) {
                $this->discord->guilds->get('id', $guild)->commands->save($slash);
            }
        } else {
            $this->discord->application->commands->save($slash);
        }
    }
    

}

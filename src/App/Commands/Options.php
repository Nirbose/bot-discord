<?php

namespace Sti2d\Revisobot\App\Commands;

use Discord\Parts\Interactions\Command\Option as CommandOption;

class Option {

    private array $builder;

    /**
     * new instance
     * 
     * @param string $name
     * @param string $description
     * @return self
     */
    public static function new(string $name, string $description): self
    {
        $self = new static();

        $self->builder = [
            'name' => $name,
            'description' => $description,
        ];

        return $self;
    }

    /**
     * Set type of option
     * 
     * @param CommandOption $type
     */
    public function setType(CommandOption $type): self
    {
        $this->builder['type'] = $type;

        return $this;
    }

    public function setRequired(bool $required): self
    {
        $this->builder['required'] = $required;

        return $this;
    }

    public function __toArray(): array
    {
        return $this->builder;
    }

}

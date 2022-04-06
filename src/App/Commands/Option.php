<?php

namespace Sti2d\Revisobot\App\Commands;

class Option implements \JsonSerializable {

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
     * @param int $type
     */
    public function setType(int $type): self
    {
        $this->builder['type'] = $type;

        return $this;
    }

    public function setRequired(bool $required): self
    {
        $this->builder['required'] = $required;

        return $this;
    }

    public function addChoices(OptionChoice ...$choices): self
    {
        foreach ($choices as $choice) {
            $this->builder['choices'][] = $choice->toArray();
        }

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->builder;
    }

}

<?php

namespace Sti2d\Revisobot\App\Commands;

class OptionChoice {

    private string $name;

    private $value;

    public static function new(string $name, $value)
    {
        $self = new static();

        $self->name = $name;
        $self->value = $value;

        return $self;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
        ];
    }

}
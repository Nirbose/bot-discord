<?php

namespace Sti2d\Revisobot\App\Commands;

class Create {

    /**
     * Name of command
     *
     * @var string
     */
    private string $name;

    private array $data;

    /**
     * New command
     *
     * @param string $name
     * @param string $description
     * @return self
     */
    public static function new(string $name, string $description): self
    {
        $self = new self();
        
        $self->name = $name;
        $self->data = [
            'description' => $description,
            'exec' => function() {},
        ];

        Collection::add($self->name, $self->data);

        return $self;
    }

    /**
     * Set Executor function
     * 
     * @param callback $exec
     * @return self
     */
    public function setExec(callable $exec): self
    {
        $this->inject(['exec' => $exec]);

        return $this;
    }

    /**
     * Set options
     * 
     * @param Option $options
     * @return self
     */
    public function setOptions(Option ...$options): self
    {
        var_dump((array)$options);
        $this->inject(['options' => (array)$options]);

        return $this;
    }

    /**
     * set is slash command
     * 
     * @param bool $isSlash
     * @return self
     */
    public function setIsSlash(bool $isSlash = true): self
    {
        $this->inject(['isSlash' => $isSlash]);

        return $this;
    }

    /**
     * In specific guilds
     * 
     * @param string ...$guilds
     * @return self
     */
    public function setGuilds(string ...$guilds): self
    {
        $this->inject(['guilds' => $guilds]);

        return $this;
    }

    /**
     * inject data in Collection
     *
     * @param array $data
     * @return void
     */
    private function inject(array $data): void
    {
        Collection::add($this->name, $data);
    }

}

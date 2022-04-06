<?php

namespace Sti2d\Revisobot\App\Commands;

/**
 * @method void add()
 * @method mixed get()
 */
class Collection {

    private static $commands = [];

    /**
     * Add item to collection
     * 
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public static function add(string $name, $value) {
        self::$commands[$name] = $value;
    }

    /**
     * Get item from collection
     * 
     * @param string $name
     * @return mixed
     */
    public static function get(string $name): mixed
    {
        self::$commands[$name];
    }

}

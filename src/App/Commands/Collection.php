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
     * @param string|int|array $key
     * @param mixed $value
     * @return void
     */
    public static function add(string $name, $key, $value) {
        self::$commands[$name][$key] = $value;
    }

    /**
     * Get item from collection
     * 
     * @param string $name
     * @return mixed
     */
    public static function get(string $name): mixed
    {
        return self::$commands[$name];
    }

    /**
     * Each item in collection with callback
     * 
     * @param callable $callback
     * @return void
     */
    public static function each(callable $callback) {
        foreach (self::$commands as $name => $value) {
            $callback($name, $value);
        }
    }

}

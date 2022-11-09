<?php

namespace Fw\Core;

trait MultitonTrait{

    protected static array $instances = [];


    public static function getInstance(string $instance)
    {
        if (!isset(static::$instances[$instance])) {
            static::$instances[$instance] = new $instance();
        }

        return static::$instances[$instance];
    }
    private function __construct(){

    }
}
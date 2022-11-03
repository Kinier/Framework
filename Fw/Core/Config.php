<?php

namespace Fw\Core;

class Config
{
    private static ?array $config = null;
    public static function get(string $path)
    {
        if (static::$config === null)
            static::$config = include_once __DIR__ . "/../config.php";

        $path = explode("/", $path);
        $result = static::$config;
        foreach ($path as $key) {
            $result = $result[$key] ?? null;
        }


        return $result;
    }


}
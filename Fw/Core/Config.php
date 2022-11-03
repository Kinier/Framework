<?php

namespace Fw\Core;

class Config
{
    private static array $config;
    public static function get(string $path)
    {
        $config = include_once __DIR__ . "/../config.php";

        if ($config !== true) // если еще не был подключен
            static::$config = $config;


        $path = explode("/", $path);
        $result = static::$config;
        foreach ($path as $key) {
            $result = $result[$key] ?? null;
        }


        return $result;
    }


}
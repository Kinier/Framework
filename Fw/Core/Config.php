<?php

namespace Fw\Core;

class Config
{
    private array $config;

    public function __construct()
    {
        $config = include_once __DIR__ . "/../config.php";

        if (isset($config)) {
            $this->config = $config;
        }
    }

    public function get(string $path)
    {
        $path = explode("/", $path);
        $result = $this->config;
        foreach ($path as $key) {
            $result = $result[$key] ?? null;
        }


        return $result;
    }


}
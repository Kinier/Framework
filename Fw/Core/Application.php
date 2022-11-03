<?php
namespace Fw\Core;


class Application{
    private static ?Application $instance = null;

    private static ?object $pager = null;

    private static ?object $template = null;

    private function __construct(){

    }

    public static function getInstance(): Application
    {
        if (!isset(static::$instance)){
            static::$instance = new static();
        }

        return static::$instance;
    }
}
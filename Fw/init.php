<?php


use Fw\Core\Application;
use Fw\Core\Multiton;

spl_autoload_register(function ($class) {
    if (file_exists("$class" . '.php'))
        include $class . '.php';
});

const CORE_SET = true;
session_start();

Multiton::getInstance(Application::class);

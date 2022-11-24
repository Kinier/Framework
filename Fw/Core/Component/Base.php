<?php

namespace Fw\Core\Component;

abstract class Base
{
    /**
     *   array $result
     *   массив с результатом работы комопнента
     */
    public array $result;
    /**
     *   string $id
     *   строковый id компонента
     */
    public string $id;
    /**
     *   array $params
     *   входящие параметры компонента
     */
    public array $params;
    /**
     *   Fw\Core\Component\Template $template
     *   экземпляр класса шаблона компонента
     */
    public \Fw\Core\Component\Template $template;
    /**
     *   string $__path
     *   путь к файловой структуре компонента
     */
    public string $__path;

    public abstract function executeComponent();

    public abstract function __construct();
}
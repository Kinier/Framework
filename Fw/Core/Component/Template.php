<?php


namespace Fw\Core\Component;

use Fw\Core\Page;

class Template
{
    // класс управления шаблоном компонента
    /**
     * string $__path
     * путь к файловой структуре шаблона
     */
    public string $__path;
    /**
     * string $__relativePath
     * url к файловой структуре шаблона
     */
    public string $__relativePath;
    /**
     * string $id
     * строковый id компонента
     */
    public string $id;

    /**
     * должен подключать файл шаблона
     * + стили и js
     * $page - страница подключения в шаблоне
     *
     */
    public function render(string $page = "template")
    {
        include sprintf("%s/%s.php", $this->__path, 'result_modifier');

        require sprintf("%s/%s.php", $this->__path, $page);

        include sprintf("%s/%s.php", $this->__path, 'component_epilog');

        Page::getInstance()->addCss($this->__relativePath . '/style.css');
        Page::getInstance()->addJs($this->__relativePath . '/script.js');
    }

    /**
     * В конструкторе мы должны указать жёскую зависимость от
     * компонента
     *
     */
    public function __construct(string $id, Base $component)
    {
        $this->id = $id;
    }
}
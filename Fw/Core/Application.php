<?php

namespace Fw\Core;


use Component;
use Fw\Core\Component\Template;
use Fw\Core\Type\Request;
use Fw\Core\Type\Server;
use Fw\Core\Type\Session;
use ReflectionClass;

class Application
{
    private Request $request;
    private Server $server;
    private Session $session;

    private ?object $template = null;


    public function __construct()
    {
        $this->request = Multiton::getInstance(Request::class);
        $this->server = Multiton::getInstance(Server::class);
        $this->session = Multiton::getInstance(Session::class);
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getServer()
    {
        return $this->server;
    }

    public function getSession()
    {
        return $this->session;
    }

    /**
     * example
     * Application::includeComponent(
     * 'fw:element.list',
     * 'default',
     * [
     *  "sort" => "id",
     *  "limit" => 10,
     *  "show_title" => "N"
     * ]
     * );
     * $component - неймспейс:id подключаемого компонента
     * $templateId - id шаблона подключаемого компонента
     * $params - массив входящих параметров
     * метод подключает компонент, инициализирует его по указанным параметрам.
     * Основная задача, понять какой класс подключать и не подключить его
     * повторно
     * @param string $component
     * @param string $templateId
     * @param array $params
     */
    public static function includeComponent(string $component, string $templateId, array $params)
    {
        [$namespace, $componentId] = explode(':', $component, 2);
        include_once sprintf("%s/../components/%s/%s/.class.php", __DIR__, $namespace, $componentId);

        $component = new Component($templateId, $namespace, $componentId, $params);


        $component->executeComponent();
    }

    public function header()
    {
        $this->startBuffer();
    }

    public function footer()
    {
        $this->endBuffer();
    }

    private function startBuffer()
    {
        ob_start();
        include __DIR__ . "/../templates/" . Config::get('templateSettings/template') . '/header.php';
    }

    private function endBuffer()
    {
        include __DIR__ . "/../templates/" . Config::get('templateSettings/template') . '/footer.php';
        $content = ob_get_contents();

        $replace = Page::getInstance()->getAllReplace();

        $content = str_replace(array_keys($replace), $replace, $content);

        ob_end_clean();
        echo $content;
    }

    private function restartBuffer()
    {
        ob_clean();
    }
}

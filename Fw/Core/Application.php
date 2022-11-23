<?php
namespace Fw\Core;


class Application
{

    private ?object $template = null;


    public function __construct()
    {
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
        include __DIR__ ."/../templates/" . Config::get('templateSettings/template') . '/header.php';
    }

    private function endBuffer()
    {
        include __DIR__. "/../templates/" . Config::get('templateSettings/template') . '/footer.php';
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

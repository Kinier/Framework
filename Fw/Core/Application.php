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


        foreach ($replace as $macro => $value) {
            if (is_array($value)) {
                $str = implode('', $value);
                $content = str_replace($macro, $str, $content);
            } else {
                $content = str_replace($macro, $value, $content);
            }
        }
        ob_end_clean();
        echo $content;
    }

    private function restartBuffer()
    {
        ob_clean();
    }
}

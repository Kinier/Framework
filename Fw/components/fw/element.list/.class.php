<?php

use Fw\Core\Component\Base;
use Fw\Core\Component\Template;

class Component extends Base
{


    public function executeComponent()
    {
        $this->template->render();
    }

    // ну написано что я здесь должен объявлять шаблон и заполнять настройками
    // такая реализация вообще имеет право на жизнь?), учитывая что абстрактный конструктор без параметров
    public function __construct($templateId = 'default', $namespace = 'fw', $id = '', $params = [])
    {
        $template = new Template($templateId, $this);
        $template->__path = sprintf("%s/templates/%s", __DIR__, $templateId);
        $template->__relativePath = sprintf(
            "/fw/components/%s/%s/templates/%s",
            $namespace,
            $id,
            $templateId
        );
        $this->id = $id;
        $this->__path = sprintf("%s/../components/%s/%s", __DIR__, $namespace, $id);
        $this->params = $params;

        $this->template = $template;
    }
}
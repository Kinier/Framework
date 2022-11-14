<?php


namespace Fw\Core;

class Page{

    private static ?Page $instance = null;
    // для мапа модуль ds нужен
    private array $jsSrc;
    private array $cssLink;
    private array $string;
    private array $properties;
    // мб так просто
    public function addString(string $src){
        $this->string[] = $string;
    }

    public function addJs(string $src){
        $this->jsSrc[$src] = "<script src=\"$src\" type='text/javascript'></script>";
    }

    public function addCss(string $link): void{
        $this->cssLink[$link] = "<link rel='stylesheet' href=\"$link\"/>";
    }

    public function setProperty(string $id, $value): void{
        $this->properties[$id] = $value;
    }


    public function getProperty(string $id):string{
        return $this->properties[$id];
    } // получение по ключу
    public function showProperty(string $id){
        echo "#FW_PAGE_PROPERTY_{$id}#";
    } // выводит макрос для будущей замены #FW_PAGE_PROPERY_{$id}#
    public function getAllReplace(): array
    {
        $array = [];
        $array["#FW_MACRO_CSS#"] = $this->cssLink;
        $array["#FW_MACRO_JS#"] = $this->jsSrc;
        $array["#FW_MACRO_STRING#"] = $this->string;
        foreach ($this->properties as $id => $property){
            $array["#FW_PAGE_PROPERTY_{$id}"] = $property;
        }
        return $array;
    } // получает массив макросов и значений для замены
    public function showHead(){
        echo "#FW_MACRO_CSS#" . PHP_EOL;
        echo "#FW_MACRO_JS#" . PHP_EOL;
        echo "#FW_MACRO_STRING#" . PHP_EOL;
    } // выводит 3 макроса замены CSS / STR / JS

    private function __construct()
    {
        $this->jsSrc = [];
        $this->cssLink = [];
        $this->string = [];
        $this->properties = [];
    }

    public static function getInstance(): Page
    {
        if (static::$instance === null)
            static::$instance = new static();

        return static::$instance;
    }
}

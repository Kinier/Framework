<?php

namespace Fw\Core;


class Route{


    private $routes;

    public function __construct()
    {
        $routes = include_once __DIR__ . "/../routes.php";
        if (isset($routes)) {
            $this->routes = $routes;
        }
    }

    public function set() // idk how to name
    {
        foreach($this->routes as $route){
            preg_match($route['condition'], $_SERVER['REQUEST_URI'], $matches); // route params if match

            if ($matches){


                $paramsArray = [];
                array_shift($matches);

                $queryParamsNames = $this->parseRuleParamsNames($route['rule']);

                foreach($matches as $key => $value){
                    $paramsArray[$queryParamsNames[0][$key]] = $value;
                }
                // дальше видимо надо будет отправлять обработчику
                // require_once "$route->path"
            }
        }
    }

    protected function parseRuleParamsNames($rule){
        preg_match_all('#[a-z]+#', $rule, $queryParamsNames );
        return $queryParamsNames;
    }

}
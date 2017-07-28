<?php

namespace App\Core;

class Router{
    public $routes=[
        'GET'=>[],
        'POST'=>[]
    ];
    public static function load($file)
    {
        $router=new static;
        require $file;
        return $router;
    }
    public  function get($uri,$controller)
    {
        $this->routes['GET'][$uri]=$controller;
    }
    public function post($uri,$controller)
    {
        $this->routes['POST'][$uri]=$controller;
    }
    public function direct($uri,$requestType)
    {
        //array_key_exists(a,b),检查数组b中是否有键值a
        if(array_key_exists($uri,$this->routes[$requestType])){
            return $this->callAction(
                ///...操作符,将数组分割成多个变量,这里作为方法的参数
                ...explode('@',$this->routes[$requestType][$uri])
            );
        }
        throw new Exception('No route found for the uri');
    }

    protected function callAction($controller,$action)
    {
        $controller="App\\Controller\\{$controller}";
        $controller=new $controller;
        //method_exists($对象,$方法),检查指定对象中是否有指定方法
        if(!method_exists($controller,$action)){
            throw new Exception("{$controller} does not respond to the {$action} action!");
        }
        return $controller->$action();
    }
    
}
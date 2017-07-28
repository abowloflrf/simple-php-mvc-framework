<?php

namespace App\Core;

class App
{
    protected static $registry = [];

    //在app中绑定一个新值
    public static function bind($key,$value)
    {
        static::$registry[$key]=$value;
    }

    //获取app容器中的一个指定的值
    public static function get($key)
    {
        if(!array_key_exists($key,static::$registry)){
            throw new Exception("No {$key} is bound in the container!");
        }
        return static::$registry[$key];
    }
}
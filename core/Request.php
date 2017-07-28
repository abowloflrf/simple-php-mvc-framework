<?php

namespace App\Core;

class Request{
    public static function uri(){
        return trim(//去掉头尾的字符,第二个参数指定要去掉的字符
            parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'
        );
    }

    public static function method(){
        return $_SERVER['REQUEST_METHOD'];
    }
}
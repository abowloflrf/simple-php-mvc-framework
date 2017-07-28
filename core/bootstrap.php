<?php

use App\Core\App;

//App容器中绑定config配置文件
App::bind('config',require 'config.php');

//使用了composer中的autoloader,因此下面的类不需要被require,已经自动被包含
// //Request.php:解析客户端访问的uri和method,如:要访问服务器的/test.php,则解析出uri->test.php,method->GET
// require 'core/Request.php';

// //路由类
// require 'core/Router.php';
// //数据库连接类
// require 'core/database/Connection.php';
// //数据库语句构建类
// require 'core/database/QueryBuilder.php';

//在App容器中绑定database的值,值为一个pdo对象,保证访问每一个页面时都有pdo类的存在以访问数据库
App::bind('database',new QueryBuilder(
    //连接mysql数据库并返回一个pdo对象->$pdo
    Connection::make(App::get('config')['database'])
));

function view($name,$data=[])
{
    extract($data);

    return require "app/views/{$name}.view.php";
}
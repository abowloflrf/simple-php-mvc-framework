<?php

$app=[];
//从config.php中导入配置
$app['config'] = require 'config.php';


//Request.php:解析客户端访问的uri和method,如:要访问服务器的/test.php,则解析出uri->test.php,method->GET
require 'core/Request.php';

//路由类
require 'core/Router.php';
//数据库连接类
require 'core/database/Connection.php';
//数据库语句构建类
require 'core/database/QueryBuilder.php';

//保证访问每一个页面时都有pdo类的存在以访问数据库
$app['database']= new QueryBuilder(

    //连接mysql数据库并返回一个pdo对象->$pdo
    Connection::make($app['config']['database'])
);

<?php

require 'core/bootstrap.php';

//执行路由类Router的静态方法load,接受一个routes.php来配置路由,load方法返回一个route对象
//取得route对象之后执行了对象下的方法direct来获取用户的uri与method并进行相应的导航
require Router::load('routes.php')->
    direct(
        Request::uri(),
        Request::method()
    );

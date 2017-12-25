<?php
/**
 *前端路由
 *
 */
use Core\Yyf\Router;

Router::get('/', 'Index@index');
Router::get('/user', 'User/Index@test1');

Router::error(function() {
    try{
        //自由路由形式
        Router::free();
        exit;
    }catch (Exception $e){
        echo $e->getMessage();
        exit;
    }

});
Router::dispatch();


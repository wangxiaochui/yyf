<?php
/**
 *前端路由
 *
 */
use Core\Yyf\Router;

Router::get('/', 'index@index');
Router::get('/user', 'user/index@test1');

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


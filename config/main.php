<?php
/**
 * Created by PhpStorm.
 * User: yanxs
 * Date: 2017/12/18
 * Time: 14:13
 */

return [
    'controller_namespace' =>  "App\\Controller\\", //控制器命名空间
    'view_path' => "/app/views/",   //视图放置位置
    'is_twig' => false,    //是否使用twig模板引擎
    'db' => [
        'driver'    => 'mysql',
        'host'      => '127.0.0.1',
        'database'  => 'isms',
        'username'  => 'root',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_general_ci',
        'prefix'    => 'isms_'

    ],
    'is_vue' => 1, //使用vue作为前端
    'vue_html' => 'home.vue.index'
];
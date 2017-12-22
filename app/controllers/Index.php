<?php
namespace App\Controller;
use Core\Yyf\App;

/**
 * Created by PhpStorm.
 * User: yanxs
 * Date: 2017/12/18
 * Time: 11:53
 */
class Index
{
    public function index(){
        //vue融合测试11
        App::view('home.vue.index');
    }

    public function test1(){
        echo 'test1';exit;
    }

    public function vue(){
        App::view('home.vue.index');
    }
}
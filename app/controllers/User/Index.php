<?php
namespace App\Controller\User;
/**
 * Created by PhpStorm.
 * User: yanxs
 * Date: 2017/12/18
 * Time: 14:55
 */
use App\Model\User;
use Core\Yyf\App;
use Core\Yyf\Container;

class Index
{
    public function test1(){
        $member = User::where('id',1)->first()->toArray();
        //var_dump(Container::get('request')->get('aa'));
        //var_dump(Container::get('request')->post('aa'));
        //App::view('home.user.index',['member'=>$member]); //原生php模板
        //设置is_is_twig来确定是否开启twig
        App::view('home.user.index',['member'=>$member]);
    }

    public function db(){
        //数据库操作
        $info = Container::get('db')->table('user')->get()->toArray();
        //$info = Container::get('db')->table('user')->select('username')->get()->toArray();
        //参照 http://laravelacademy.org/post/6955.html
       // var_dump(Container::get('request')->get('aa',0));
        var_dump($info);exit;
    }
}
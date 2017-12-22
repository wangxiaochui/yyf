<?php
namespace App\Controller\User;
use App\Model\User;
use Core\Yyf\App;
use core\yyf\Container;

/**
 * Created by PhpStorm.
 * User: yanxs
 * Date: 2017/12/18
 * Time: 14:55
 */
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
}
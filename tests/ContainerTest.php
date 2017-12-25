<?php
namespace tests;
use Core\Yyf\Container;

/**
 * Created by PhpStorm.
 * User: yanxs
 * Date: 2017/12/25
 * Time: 15:29
 * phpunit单元测试示例
 * 使用phpunit --bootstrap ../vendor/autoload.php ContainerTest.php,可以使用phpunit.xml设置bootstrap
 */
class ContainerTest extends \PHPUnit\Framework\TestCase
{
    public function testContainer(){
        Container::set('yanxs','1111');
        $this->assertEquals('1111',Container::get('yanxs'));
    }

    public function testEmpty(){
        $test = [1];
        $this->assertEmpty($test);
        return $test;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: yanxs
 * Date: 2017/12/18
 * Time: 14:27
 * 依赖容器
 */

namespace core\yyf;


class Container
{
    public static  $_store = array();
    public static  $_di= array();
    public static $config;
    public static $instance;  //做成单例模式

    private function __construct(){
    }
    private function __clone(){}

    /**
     * @param null $config
     * @return Container
     */
    public static function getInstance($config = null)
    {
        if(!(self::$instance instanceof self))
        {
            self::$instance = new self($config);
        }
        self::$config = $config;
        foreach($config as $k=>$v)
        {
            self::set($k,$v);
        }
        return self::$instance;
    }

    /**
     * @param $key
     * @param $val
     */
    public static function set($key,$val)
    {
        self::$_store[$key] = $val;
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        $val = self::$_store[$key];
        if(is_string($val)) //构造器无参数
        {
            try{
                $reflection_object = new \ReflectionClass($val); //如果存在这个类，那就实例化
                self::$_di[$key]  = $reflection_object->newInstanceArgs();
            }catch (\Exception $e){
                self::$_di[$key]  = $val;
            }

        }elseif(is_array($val)) //有构造参数
        {
            if(!key_exists('class', $val))
            {
                self::$_di[$key] = $val;
            }
            else //配置了类名
            {
                $reflection_object = new \ReflectionClass($val['class']);
                if(empty($val['params']))
                {
                    self::$_di[$key] = $reflection_object->newInstanceArgs();
                }
                else
                {
                    self::$_di[$key] = $reflection_object->newInstanceArgs($val['params']);
                }
            }
        }else{
            self::$_di[$key]  = $val;
        }
        return self::$_di[$key];
    }
}
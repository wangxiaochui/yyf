<?php
/**
 * Created by PhpStorm.
 * User: yanxs
 * Date: 2017/12/18
 * Time: 16:34
 */

namespace Core\Yyf;


class View
{
    const VIEW_BASE_PATH = '';

    public $view;
    public $data;
    public $view_base_path = '';

    public function __construct($view)
    {
        $this->view = $view;
        $this->view_base_path = Container::get('view_path');
    }

    public static function make($viewName = null)
    {
        if ( ! $viewName ) {
            throw new \Exception("视图名称不能为空！");
        } else {

            $viewFilePath = self::getFilePath($viewName);

            if ( is_file($viewFilePath) ) {
                return new View($viewFilePath);
            } else {
                throw new \Exception("视图文件不存在！");
            }
        }
    }

    public function with($key, $value = null)
    {
        $this->data[$key] = $value;
        return $this;
    }


    private static function getFilePath($viewName)
    {
        $filePath = str_replace('.', '/', $viewName);
        return BASE_PATH.Container::get('view_path').$filePath.'.php';
    }

    public function __call($method, $parameters)
    {
        if (starts_with($method, 'with'))
        {
            return $this->with(snake_case(substr($method, 4)), $parameters[0]);
        }

        throw new \Exception("方法 [$method] 不存在！.");
    }
}
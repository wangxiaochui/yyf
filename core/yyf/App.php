<?php
/**
 * Created by PhpStorm.
 * User: yanxs
 * Date: 2017/12/18
 * Time: 14:27
 * 核心启动类
 */
namespace Core\Yyf;
use Illuminate\Database\Capsule\Manager as Capsule;

class App{
    public static $di;
    public function __construct()
    {

    }
    /**
     * 做配置注入，数据库初始连接
     * @param $config
     * @return null
     */
    public static function run($config){
        //将配置注入容器
        Container::getInstance($config);
        Container::set('request',"Core\\Yyf\\Request");

        //数据库连接
        $capsule = new Capsule();
        $capsule->addConnection($config['db']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        Container::set('db',$capsule);
        return true;
    }

    /**
     * 视图渲染
     * @param $view
     * @param array $data
     * @return \Twig_Environment
     * @throws \Exception
     */
    public static function view($view, $data=[]){
        $is_twig = Container::get('is_twig');
        if($is_twig){
            $path = BASE_PATH.Container::get('view_path');
            $loader = new \Twig_Loader_Filesystem($path);
            $twig = new \Twig_Environment($loader, []);

            $filePath = str_replace('.', '/', $view);
            $html_path = $filePath.'.html';
            echo $twig->render($html_path, $data);

            return $twig;
        }else{
            $objView =  View::make($view);
            if(!is_array($data)){
                throw new \Exception('参数必须是数组');
            }
            foreach($data as $k=>$v){
                $objView->with($k,$v);
            }
            if(!empty($data)){
                extract($objView->data);
            }

            require $objView->view;
        }

    }


}
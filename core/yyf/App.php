<?php
namespace Core\Yyf;
use Illuminate\Database\Capsule\Manager as Capsule;

class App{
    public static $di;
    public function __construct()
    {

    }
    public static function run($config){
        //将配置注入容器
        Container::getInstance($config);
        Container::set('request',"Core\\Yyf\\Request");

        //数据库连接
        $capsule = new Capsule;
        $capsule->addConnection($config['db']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
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
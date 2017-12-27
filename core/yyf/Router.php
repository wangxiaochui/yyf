<?php
namespace Core\Yyf;
/**
 * Created by PhpStorm.
 * User: yanxs
 * Date: 2017/12/18
 * Time: 10:49
 * 路由操作
 */
use NoahBuscher\Macaw\Macaw;
class Router extends Macaw
{
    /**
     * 自由路由
     */
    public static function free(){
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/');
        $method = $_SERVER['REQUEST_METHOD'];
        $arr_uri = explode('/',$uri);

        $c_namespace = Container::get('controller_namespace');
        if(count($arr_uri) < 2){
            $action = 'index';
        }elseif(count($arr_uri)<1){
            $controller = $c_namespace.'index';
        }else{

            $action = array_pop($arr_uri);
            $controller = $c_namespace;
            foreach($arr_uri as $k=>$v){
                if(!empty($v)){
                    $controller .= $v.'\\';
                }
            }
            $controller = rtrim($controller,'\\');
            if (!method_exists($controller, $action)) {

                throw new \Exception('404 not found');
            } else {
                call_user_func_array(array($controller, $action), []);
            }


        }



    }
    //覆盖核心路由方法
    public static function dispatch(){

        $uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/');
        $uri =  empty($uri)? '/':$uri;
        $method = $_SERVER['REQUEST_METHOD'];

        $searches = array_keys(static::$patterns);
        $replaces = array_values(static::$patterns);

        $found_route = false;

        self::$routes = preg_replace('/\/+/', '/', self::$routes);
        // Check if route is defined without regex
        if (in_array($uri, self::$routes)) {

            $route_pos = array_keys(self::$routes, $uri);
            foreach ($route_pos as $route) {
                // Using an ANY option to match both GET and POST requests
                if (self::$methods[$route] == $method || self::$methods[$route] == 'ANY') {
                    $found_route = true;

                    // If route is not an object
                    if (!is_object(self::$callbacks[$route])) {
                        $c_namespace = Container::get('controller_namespace');
                        if(strstr(self::$callbacks[$route], '/')){
                            self::$callbacks[$route] = str_replace('/','\\',self::$callbacks[$route]);
                        }
                        if(strstr(self::$callbacks[$route],$c_namespace)==false){
                            self::$callbacks[$route] = $c_namespace.ucfirst(self::$callbacks[$route]);

                        }
                        // Grab all parts based on a / separator
                        $parts = explode('/',self::$callbacks[$route]);
                        // Collect the last index of the array
                        $last = end($parts);

                        // Grab the controller name and method call
                        $segments = explode('@',$last);

                        // Instanitate controller
                        $controller = new $segments[0]();

                        // Call method
                        $controller->{$segments[1]}();

                        if (self::$halts) return;
                    } else {
                        // Call closure
                        call_user_func(self::$callbacks[$route]);

                        if (self::$halts) return;
                    }
                }
            }
        } else {
            // Check if defined with regex
            $pos = 0;
            foreach (self::$routes as $route) {
                if (strpos($route, ':') !== false) {
                    $route = str_replace($searches, $replaces, $route);
                }

                if (preg_match('#^' . $route . '$#', $uri, $matched)) {
                    if (self::$methods[$pos] == $method || self::$methods[$pos] == 'ANY') {
                        $found_route = true;

                        // Remove $matched[0] as [1] is the first parameter.
                        array_shift($matched);

                        if (!is_object(self::$callbacks[$pos])) {

                            // Grab all parts based on a / separator
                            $parts = explode('/',self::$callbacks[$pos]);

                            // Collect the last index of the array
                            $last = end($parts);

                            // Grab the controller name and method call
                            $segments = explode('@',$last);

                            // Instanitate controller
                            $controller = new $segments[0]();

                            // Fix multi parameters
                            if (!method_exists($controller, $segments[1])) {
                                echo "controller and action not found";
                            } else {
                                call_user_func_array(array($controller, $segments[1]), $matched);
                            }

                            if (self::$halts) return;
                        } else {
                            call_user_func_array(self::$callbacks[$pos], $matched);

                            if (self::$halts) return;
                        }
                    }
                }
                $pos++;
            }
        }
        // Run the error callback if the route was not found
        if ($found_route == false) {
            if (!self::$error_callback) {
                self::$error_callback = function() {
                    header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
                    echo '404';
                };
            } else {
                if (is_string(self::$error_callback)) {
                    self::get($_SERVER['REQUEST_URI'], self::$error_callback);
                    self::$error_callback = null;
                    self::dispatch();
                    return ;
                }
            }
            call_user_func(self::$error_callback);
        }
    }
}
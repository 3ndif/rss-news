<?php
namespace application\core;

class Route
{
    static public $routes = null;

    static function start()
    {
        if (self::$routes == null) {
            $url = explode('?', substr(strtolower($_SERVER['REQUEST_URI']),1));
            self::$routes = explode('/', $url[0]);
        }
        $controller_name = 'Index';
        $action_name = 'index';

        if (!empty(self::$routes[0])) {
            $action_name = self::$routes[0];
        }

        $controller_class = '\application\\controllers\\'.$controller_name.'Controller';
        $action_name = 'action'.$action_name;

        if (!class_exists($controller_class)){
            return Route::Error404();
        }

        $controller = new $controller_class;

        if(method_exists($controller, $action_name)) {
            return $controller->$action_name();
        }
        else {
            Route::Error404();
        }
    }

    public static function Error404() {
        $protocol = 'http';
        $host = $protocol.'://'.$_SERVER['HTTP_HOST'];
//        header('HTTP/1.1 404 Not Found');
//        header("Status: 404 Not Found");
        header('Location:'.$host.'/error404');
    }
}
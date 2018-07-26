<?php

namespace application\core;

use application\core\View;

class Router {

    protected $routes = [];
    protected $params = [];

    /* Construct makes  routes from routes.php are regular expressions */
    
    public function __construct()
    {
        $Routes = require 'application/config/routes.php';
            foreach ($Routes as $key => $val)
            {
                $key = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $key);/*????????????*/
                $key = '#^'.$key.'$#';
                $this->routes[$key] = $val;
            }

    }



    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params)
        {
            if (preg_match($route, $url, $matches))
            {   //cycle need for counting articles
                foreach ($matches as $key => $match)
                {
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int) $match;
                        }
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;

                return true;


            }
        }
        return false;
    }

    public function run(){

        if ($this->match()) {
            $path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';


            if (class_exists($path))
            {
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    echo 'method doesnot exist';
                    //View::errorCode(404);
                }
            } else {
                echo $path;
                //View::errorCode(404);
            }
        } else {
            echo 'path doesnot find';
            //View::errorCode(404);
        }
    }

}
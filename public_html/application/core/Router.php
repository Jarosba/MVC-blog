<?php
namespace application\core;
use application\core\View ;


class Router {

    protected $routers=[];
    protected $params=[];


    public function __construct()
    {
        $arr=require  'application/config/routers.php';
        foreach ($arr as $key => $val)
        {
            $this->add($key, $val);
        }
    }

    public function add($route, $params)
    {
        $route='#^'.$route.'$#';
        $this->routers[$route]=$params;
    }

    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routers as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
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

    /**
     *
     */
    public function run(){
       if($this->match()){

           $path='application\controllers\\'.ucfirst($this->params['controller']).'Controller';

           //debug(class_exists($path));

           if(class_exists($path))
            {
                $action=$this->params['action'].'Action';


                if(method_exists($path,$action))
                {
                    $controller = new $path($this->params);
                    $controller->$action();
                }
                else
                {
                   // View::errorCode(404);
                    echo 'Action not found'.$action;
                }
            }
            else
            {
                //View::errorCode(404);
                echo "CONTROLLER NOT FOUND".$path;
            }
       }
       else

           {
            //   View::errorCode(404);
              echo 'ERROR 404';
           }
    }

}

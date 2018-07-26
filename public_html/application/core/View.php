<?php

namespace application\core;

class View
{

    public $path;// path to our view

    public $route;

    public $layout = 'default';

    public function __construct($route)
    {

        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }





    public function BuildScreen($title, $vars = [])
    {
        extract($vars); /*create from array vars  as set of variables $key=$val */
        $path = 'application/views/'.$this->path.'.php';

        if (file_exists($path)) {
            ob_start();     /*Turn on output buffering */
            require $path;/*open file and save output in buffering*/
            $content= ob_get_clean(); /*put all results from file in content and clean buffering*/
            require 'application/views/layouts/'.$this->layout.'.php';
        }
    }




    public function render($title, $vars = [])
    {
        extract($vars); /*create from array vars  as set of variables $key=$val */
        $path = 'application/views/'.$this->path.'.php';

        if (file_exists($path)) {
            ob_start();     /*Turn on output buffering */
            require $path;/*open file and save output in buffering*/
            $content= ob_get_clean(); /*put all results from file in content and clean buffering*/
            require 'application/views/layouts/'.$this->layout.'.php';
        }
    }

    public function redirect($url)
    {
        header('location: /'.$url);
        exit;
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'application/views/errors/'.$code.'.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    public function message($status, $message)
    {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function location($url)
    {
        exit(json_encode(['url' => $url]));
    }

}	
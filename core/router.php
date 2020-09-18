<?php

class Router {
    public $routes = [
        "POST" => [],
        "GET" => []
    ];
    public function get($url,$controller){
        return $this->routes["GET"][$url] = $controller;
    }
    public function post($url,$controller){
        return $this->routes["POST"][$url] = $controller;
    }

    public function define($routes){
        return $this->routes = $routes;
    }
    
    public function redirect($url,$method){
        if(array_key_exists($url, $this->routes[$method])){
            $explode = explode('@',$this->routes[$method][$url]);

           return $this->callAction($explode[0], $explode[1]);
        }
        die('There is no "'.$url.'" route in this website');
    }

    public function callAction($controller, $action){
        $class = new $controller;
        $class->$action();
    }
}

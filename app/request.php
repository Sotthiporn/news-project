<?php

class Request {
    public static function url(){
        $url = strtok($_SERVER['REQUEST_URI'], '?');
        $url = trim($url, '/');
        return $url;
    }
    public function rq_method(){
        return $_SERVER["REQUEST_METHOD"];
    }
}

<?php

class App {
    protected static $register = [];

    public static function bind($key,$value){
        static::$register[$key] = $value;
    }
    public static function get($key){
        return static::$register[$key];
    }
}
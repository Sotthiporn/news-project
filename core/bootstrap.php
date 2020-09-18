<?php
    App::bind('config', require('config.php'));

    App::bind('connection', Connection::make(App::get('config')));

    App::bind('database', new QueryBuilder( 
        App::get('connection')
    ));

    function redirect($location){
        return header('Location:'.$location);
    }

    function view($name, $data = []){
        extract($data);  //extract = convert key of array to variable
        return require "app/views/home/{$name}.view.php";
    }
    function view_admin($name, $data = []){
        extract($data);  //extract = convert key of array to variable
        return require "app/views/admin/{$name}.view.php";
    }

?>

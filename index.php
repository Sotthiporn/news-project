<?php

require "vendor/autoload.php";

$query = require('core/bootstrap.php');

$router = new Router();

$routes = require "app/routes.php";

$router->redirect(Request::url(), Request::rq_method());
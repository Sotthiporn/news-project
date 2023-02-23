<?php

require "vendor/autoload.php";

$bootstrap = require('core/bootstrap.php');

$router = new Router();

$routes = require "app/routes.php";

$router->redirect(Request::url(), Request::rq_method());
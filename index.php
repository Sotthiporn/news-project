<?php

require "vendor/autoload.php";

$bootstrap = require('core/bootstrap.php');

$router = new Router();

$route_list = require "routes/routes.php";

$router->redirect(Request::url(), Request::rq_method());
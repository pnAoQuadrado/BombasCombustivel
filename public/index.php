<?php

use app\classes\Layout;
use app\classes\Route;
use app\classes\Uri;

require "../bootstrap.php";

$routes = [
    '/' => 'controllers/homeController'
];

$uri = Uri::load();
$layout = new Layout;

require Route::load($routes, $uri);
require $layout->masterLayout('main');
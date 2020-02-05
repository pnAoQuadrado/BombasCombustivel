<?php

namespace Core;

class Container {

    protected static $bind = [];

    public static function bind($key, $value) {
        static::$bind[$key] = $value;
    }

    public static function getConn($key) {
        return static::$bind[$key];
    }

    public static function newController($controller) {
        $objController = "App\\controllers\\".$controller;

        return new $objController;
    }

    public static function pageNotFound() {
        if(file_exists(__DIR__."/../app/views/errors/404.php")) {
            return require __DIR__."/../app/views/errors/404.php";
        } else {
            echo "<h1>Error 404: Page Not Found</h1>";
        }
    }

    public static function serverError() {
        if(file_exists(__DIR__."/../app/views/errors/500.php")) {
            return require __DIR__."/../app/views/errors/500.php";
        } else {
            echo "<h1>Error 500: Internal error</h1>";
        }
    }
}
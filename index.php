<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'On');

spl_autoload_register(function ($class) {
    $file = str_replace('\\', '/', $class . '.php');
    if (file_exists($file)) {
        require $file;
    }
});


$app = new App\Application();

$app->router()->guard();

$app->router()->view('/login', '\App\Controller\LoginController', 'index');
$app->router()->view('/itemshop', '\App\Controller\HomeController', 'itemshop');
$app->router()->view('/', '\App\Controller\HomeController', 'index');

$app->router()->ajax('/account/login', '\App\Controller\AccountController', 'login');
$app->router()->ajax('/account/logout', '\App\Controller\AccountController', 'logout');
$app->router()->ajax('/itemshop/buy', '\App\Controller\ItemShopController', 'buy');
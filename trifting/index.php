<?php
session_start();

spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/app/Controllers/' . $class . '.php',
        __DIR__ . '/app/Models/' . $class . '.php'
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

// default route ke auth/login
$url = $_GET['url'] ?? 'auth/login';
$url = explode('/', rtrim($url, '/'));

$controllerName = ucfirst($url[0]) . 'Controller';
$method = $url[1] ?? 'index';
$params = array_slice($url, 2);

if (class_exists($controllerName)) {
    $controller = new $controllerName;

    if (method_exists($controller, $method)) {
        call_user_func_array([$controller, $method], $params);
    } else {
        echo "Method <b>$method</b> not found!";
    }
} else {
    echo "Controller <b>$controllerName</b> not found!";
}

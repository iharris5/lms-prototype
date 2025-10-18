<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/api.php';
require_once '../app/core/Controller.php';

$url = $_GET['url'] ?? 'role/index';
$parts = explode('/', $url);

$controllerName = ucfirst($parts[0]) . 'Controller';
$method = $parts[1] ?? 'index';
$params = array_slice($parts, 2);

echo "<!-- Controller: $controllerName | Method: $method -->";
echo "<!-- Loading controller file: ../app/controllers/$controllerName.php -->";

require_once "../app/controllers/$controllerName.php";
$controller = new $controllerName();
call_user_func_array([$controller, $method], $params);


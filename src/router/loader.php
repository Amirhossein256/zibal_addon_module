<?php

define('BASE_URL', '/modules/addons/zibal/');
define('MODULE_URL', $vars['modulelink']);
$action = (isset($_GET['action'])) ? $_GET['action'] : 'main/index';

list($controller, $method) = explode('/', $action);
$controller = trim($controller);
$method = trim($method);
($controller == "") ? $controller = "main" : $controller;
($method == '') ? $method = "index" : $method;
require_once __DIR__ . "/../controller/mainController.php";
require_once __DIR__ . "/../controller/" . $controller . '.php';

$class = new $controller();
return $class->$method();

<?php

ini_set('display_error',1);
error_reporting(E_ALL);

session_start();

$dir_name = str_replace('\\','/',dirname(__FILE__));
define('ROOT',$dir_name);
require_once(ROOT . '/components/Autoload.php');

$router = new Router;
$router->run();
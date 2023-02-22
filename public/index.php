<?php

use \Core\Router;

session_start();

define('DS', DIRECTORY_SEPARATOR);
define('PROOT', str_replace('public', '', __DIR__));
define('SRC', PROOT . 'src');
define('URL',$_SERVER['SERVER_NAME'].'/');

require_once SRC . DS . 'Core' . DS . 'Autoload.php';

$router = new Router();

$router->route($_SERVER['REQUEST_URI']);
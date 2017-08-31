<?php

use task\core\Route;

define('ROOT_PATH', realpath(realpath(__DIR__) . '/../../'));
define('SITE_PATH', realpath(realpath(__DIR__) . '/../../'));

require(ROOT_PATH . '/vendor/autoload.php');
$route = new Route();
var_dump($route->getPath());

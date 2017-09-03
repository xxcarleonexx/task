<?php

use task\core\Router;

define('ROOT_PATH', realpath(realpath(__DIR__) . '/../../'));
define('SITE_PATH', realpath(realpath(__DIR__) . '/../../'));

require(ROOT_PATH . '/vendor/autoload.php');
$route = new Router();
$route->runAction();

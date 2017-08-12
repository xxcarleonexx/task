<?php


namespace task\controllers;


abstract class AbstractController
{

    /**
     * @param BaseController $controller
     * @param array $params
     * @return string mixed
     */
    abstract public function runAction($controller, $params = []);

}

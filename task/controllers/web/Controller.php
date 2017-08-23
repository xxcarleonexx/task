<?php


namespace task\controllers\web;


use task\controllers\AbstractController;
use task\controllers\BaseController;
use task\View\View;

class Controller extends AbstractController
{

    protected $view;


    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @param BaseController $controller
     * @param array $params
     * @return string mixed
     */
    public function runAction($controller, $params = [])
    {

    }

    public function render($path, $parameters = [])
    {
        return $this->view->render($path, $parameters);
    }


}

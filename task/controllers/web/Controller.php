<?php


namespace task\controllers\web;


use task\controllers\AbstractController;
use task\controllers\BaseController;
use task\View\View;

class Controller
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @param string $layout
     */
    public function setLayout($layout)
    {
        $this->view->setLayout(layout);
    }

    /**
     * @return string
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param $path
     * @param array $parameters
     * @return string
     */
    public function render($path, $parameters = [])
    {
        return $this->view->render($path, $parameters);
    }

}

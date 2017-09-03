<?php


namespace task\controllers\web;


use task\views\View;

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
        $this->view->setLayout($layout);
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

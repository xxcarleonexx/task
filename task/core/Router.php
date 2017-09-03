<?php


namespace task\core;


use task\controllers\BaseController;
use task\controllers\SiteController;
use yii\web\NotFoundHttpException;

class Router
{

    private $server;
    private $fullPath;
    private $requestedPath;
    private $post;
    private $get;
    private $queryPath;

    public function __construct()
    {
        $this->queryPath = $_SERVER['REQUEST_URI'];
        $this->requestedPath = $_SERVER['QUERY_STRING'];
        $this->fullPath = (!empty($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'] . $this->queryPath;
        $this->server = $_SERVER;
        $this->get = $_GET;
        $this->post = $_POST;
    }

    /**
     * @return array
     */
    public function getFullPath()
    {
        return parse_url($this->fullPath);
    }

    public function runAction()
    {
        $requestedPath = explode('/', $this->getFullPath()['path']);
        $namespace = 'task\controllers\\';
        var_dump($this->getFullPath()['path']);
        $controllerName = $namespace . ucfirst($requestedPath[1]) . 'Controller';
        $actionName = 'action' . ucfirst($requestedPath[2]);
        var_dump($controllerName);
        var_dump($actionName);
        if (!empty($requestedPath[1]) && class_exists($controllerName)) {
           /**@var SiteController $controllerName */
            $controller = new $controllerName;
            $controller->$actionName($this->get);
        }
        $this->notFound();
    }

    private function notFound()
    {
        if(!headers_sent()) {
            header("HTTP/1.0 400 Requested Path not Found");
        }
        die;
    }

}

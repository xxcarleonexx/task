<?php


namespace task\core;


class Route
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
        $this->fullPath = $_SERVER['SERVER_NAME'] . $this->queryPath;
        $this->server = $_SERVER;
        $this->get = $_GET;
        $this->post = $_POST;
    }

    public function getPath()
    {
        return parse_url($this->fullPath);
    }

}

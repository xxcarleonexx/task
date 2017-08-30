<?php


namespace task\core;


class Route
{

    private $server;
    private $queryPath;

    public function __construct($server, $query)
    {
        $this->server = $server;
        $this->queryPath = $query;
    }

}

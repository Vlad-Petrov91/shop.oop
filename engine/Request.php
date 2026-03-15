<?php

namespace app\engine;

class Request
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;
    protected $sessionId;

    protected $method;
    protected $params = [];


    public function __construct()
    {
        $this->parseRequest();
    }

    protected function parseRequest()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];

        $url = explode('/', $this->requestString);
        $this->controllerName = $url[1];
        $this->actionName = $url[2] ?? 'index';
        $this->sessionId = session_id();
        $this->params = $_REQUEST;

        $data = json_decode(file_get_contents('php://input'), true);

        if ($data != null) {
            $this->params = $data;
        }
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }
    public function getPageName()
    {
        return $this->requestString;
    }
    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }
    public function getSession()
    {
        return $this->sessionId;
    }
}

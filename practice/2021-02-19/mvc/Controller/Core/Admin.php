<?php
require_once "C:/xampp/htdocs/mayur/mvc/Model/Core/Request.php";
class Admin
{
    protected $request = Null;
    public function __construct()
    {
        $this->setRequest();
    }
    public function setRequest()
    {

        $this->request = new Request();

        return $this;
    }
    public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest();
        }
        return $this->request;
    }
    public function redirect($actionName = null, $controllerName = null)
    {
        if ($actionName == null) {
            $actionName = $this->getRequest->getGet('a');;
        }
        if ($controllerName == null) {
            $controllerName = $this->getRequest->getGet('c');
        }
        header("location:http://localhost/mayur/mvc/index.php?c={$controllerName}&a={$actionName}");
        exit(0);

        // header("")"http://localhost/mayur/mvc/index.php?c={$controllerName}&a={$actionName}";
        // exit(0);
    }

    public function getUrl($actionName = null, $controllerName = null, $params = [], $reset = false)
    {
        $r = $this->getRequest();
        $final = $r->getGet();
        if ($reset) {
            $final = [];
        }

        if ($actionName == null) {
            $actionName = $this->getRequest->getGet('a');
        }
        if ($controllerName == null) {
            $controllerName = $this->getRequest->getGet('c');
        }
        $final['c'] = $controllerName;
        $final['a'] = $actionName;
        $final = array_merge($final, $params);
        $queryString = http_build_query($final);
        unset($final);


        //return "http://localhost/mayur/mvc/index.php?a={$actionName}&c={$controllerName}";
        return "http://localhost/mayur/mvc/index.php?{$queryString}";
        exit(0);
    }
}

<?php
namespace Model\Core;

class Url
{
    protected $request = null;
    public function __construct()
    {
        $this->setRequest();
    }
    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    }
    public function getRequest()
    {
        return $this->request;
    }

    public function getUrl($actionName = null, $controllerName = null, $params = [], $reset = false)
    {

        $final = $this->getRequest()->getGet();
        if ($reset) {
            $final = [];
        }

        if ($actionName == null) {
            $actionName = $this->getRequest()->getGet('a');
        }
        if ($controllerName == null) {
            $controllerName = $this->getRequest()->getGet('c');
        }
        if ($params == null) {
            $params = [];
        }
        $final['c'] = $controllerName;
        $final['a'] = $actionName;
        $final = array_merge($final, $params);
        $queryString = http_build_query($final);
        unset($final);

        return "http://localhost/mayur/project/index.php?{$queryString}";
        exit(0);
    }
    public function baseUrl($subUrl = null)
    {
        $url = "http://localhost/mayur/project/";
        if ($subUrl) {
            $url .= $subUrl;
        }
        return $url;
    }
}
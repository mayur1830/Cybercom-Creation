<?php
namespace Controller\Core;

class Admin
{
    protected $request = null;
    protected $layout = null;
    protected $message = null;
    public function __construct()
    {
        $this->setRequest();
        $this->setLayout();
        $this->setMessage();
    }
    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    }
    public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest();
        }
        return $this->request;
    }
    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if (!$layout) {

            $layout = \Mage::getBlock('Block\Core\Layout');
        }
        $this->layout = $layout;
        return $this;
    }
    public function getLayout()
    {
        if (!$this->layout) {
            $this->setLayout();
        }
        return $this->layout;
    }
    public function renderLayout()
    {
        echo $this->getLayout()->toHtml();

    }
    public function redirect($actionName = null, $controllerName = null, $params = [], $reset = false)
    {
        header("location:{$this->getUrl($actionName, $controllerName, $params, $reset)}");
        exit;
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
    public function setMessage()
    {
        $this->message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }
    public function getMessage()
    {
        return $this->message;
    }

}
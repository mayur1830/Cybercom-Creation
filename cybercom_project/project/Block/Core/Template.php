<?php
namespace Block\Core;

class Template
{
    protected $template = null;
    protected $children = [];
    protected $url = null;
    protected $request = null;
    protected $tabs = [];
    protected $tableRow = null;
    protected $defaultTab = null;

    public function __construct()
    {
        $this->setUrl();
        $this->setRequest();
    }
    public function setTableRow(\Model\Core\Table $tableRow)
    {
        $this->tableRow = $tableRow;
        return $this;
    }

    public function getTableRow()
    {
        return $this->tableRow;
    }
    public function setDefaultTab($defaultTab)
    {
        $this->defaultTab = $defaultTab;
        return $this;
    }
    public function getDefaultTab()
    {
        return $this->defaultTab;
    }
    public function setTabs(array $tabs)
    {
        $this->tabs = $tabs;
        return $this;
    }
    public function getTabs()
    {
        return $this->tabs;
    }
    public function addTab($key, $tab = [])
    {
        $this->tabs[$key] = $tab;
        return $this;
    }
    public function getTab($key)
    {
        if (!array_key_exists($key, $this->tabs)) {
            return null;
        }
        return $this->tabs[$key];
    }
    public function removeTab($key)
    {
        if (!array_key_exists($key, $this->tabs)) {
            return null;
        }
        unset($this->tabs[$key]);
    }
    public function setTemplate($t)
    {
        $this->template = $t;
        return $this;

    }
    public function getTemplate()
    {
        return $this->template;
    }
    public function toHtml()
    {
        ob_start();
        require_once $this->getTemplate();
        $content = ob_get_contents();
        ob_end_clean();
        return $content;

    }
    public function setChildren(array $children = null)
    {
        $this->children = $children;
        return $this;
    }
    public function getChildren()
    {
        return $this->children;
    }
    public function addChild(\Block\Core\Template $child, $key = null)
    {
        if (!$key) {
            $key = get_class($child);
        }
        $this->children[$key] = $child;
        return $this;
    }
    public function getChild($key = null)
    {
        if (!array_key_exists($key, $this->children)) {
            return null;
        }
        return $this->children[$key];
    }
    public function removeChild($key)
    {
        if (array_key_exists($key, $this->children)) {
            unset($this->children[$key]);
        }
        return $this;
    }
    public function createBlock($className)
    {
        return \Mage::getBlock($className);
    }

    public function setUrl($url = null)
    {
        if (!$url) {
            $url = \Mage::getModel('Model\Core\Url');
        }
        $this->url = $url;
        return $this;

    }
    public function getUrl()
    {
        if (!$this->url) {
            $this->setUrl();
        }
        return $this->url;
    }
    public function setRequest($request = null)
    {
        if (!$request) {
            $request = \Mage::getModel('Model\Core\Request');
        }
        $this->request = $request;
        return $this;
    }
    public function getRequest()
    {
        return $this->request;
    }
    public function subUrl($subUrl = null)
    {
        return $this->getUrl()->baseUrl($subUrl);
    }
    public function getMessage()
    {
        return \Mage::getModel('Model\Admin\Message');
    }

}
<?php
namespace Block\Core;

\Mage::loadFileByClassName('Block\Core\Template');
class Layout extends \Block\Core\Template
{
    public function __construct()
    {

        $this->setTemplate('View/core/layout/onecolumn.php');
        $this->prepareChildren();
    }
    public function prepareChildren()
    {
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Content'), 'content');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Left'), 'left');
    }
    public function getContent()
    {
        return $this->getChild('content');
    }
    public function getLeft()
    {
        return $this->getChild('left');
    }
    public function getRight()
    {
        return $this->getRight();
    }

}
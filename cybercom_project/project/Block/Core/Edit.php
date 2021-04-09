<?php
namespace Block\Core;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $tab = null;
    protected $tabClass = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/core/edit.php');
    }
    public function setTabClass($tabClass)
    {
        $this->tabClass = $tabClass;
        return $this;
    }
    public function getTabClass()
    {
        return $this->tabClass;
    }
    public function getTabContent()
    {

        $tabsBlock = $this->getTabClass();
        $tabs = $tabsBlock->getTabs();

        $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];

        echo \Mage::getBlock($blockClassName)->setTableRow($this->getTableRow())->toHtml();

    }
    public function getTabHtml()
    {
        echo $this->tabClass->toHtml();
    }

}
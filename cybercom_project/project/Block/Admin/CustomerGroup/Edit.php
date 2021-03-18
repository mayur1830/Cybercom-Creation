<?php
namespace Block\Admin\CustomerGroup;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $customerGroup = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/customergroup/form.php');
    }
    public function setCustomerGroup(\Model\Admin\CustomerGroup $customerGroup)
    {
        $this->customerGroup = $customerGroup;
        return $this;
    }
    public function getCustomerGroup()
    {
        return $this->customerGroup;
    }
    public function getTabContent()
    {
        $tabsBlock = \Mage::getBlock('Block\Admin\CustomerGroup\Edit\Tabs');
        $tabs = $tabsBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockClassName)->setCustomerGroup($this->getCustomerGroup())->toHtml();

    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Admin_CustomerGroup');
    }

}
<?php
namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $customer = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/customer/form.php');
    }
    public function setCustomer(\Model\Admin\Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }
    public function getCustomer()
    {
        return $this->customer;
    }
    public function getTabContent()
    {
        $tabsBlock = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs');
        $tabs = $tabsBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockClassName)->setCustomer($this->getCustomer())->toHtml();

    }

    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Admin_Customer');
    }

}
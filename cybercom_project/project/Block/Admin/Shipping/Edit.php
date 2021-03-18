<?php
namespace Block\Admin\Shipping;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $shipping = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/shipping/form.php');
    }
    public function setShipping(\Model\Admin\Shipping $shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }
    public function getShipping()
    {
        return $this->shipping;
    }
    public function getTabContent()
    {

        $tabsBlock = \Mage::getBlock('Block\Admin\Shipping\Edit\Tabs');
        $tabs = $tabsBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];

        echo \Mage::getBlock($blockClassName)->setShipping($this->getShipping())->toHtml();

    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Admin_Shipping');
    }

}
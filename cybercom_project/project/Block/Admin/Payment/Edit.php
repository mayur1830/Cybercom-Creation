<?php
namespace Block\Admin\Payment;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $payment = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/payment/form.php');
    }
    public function setPayment(\Model\Admin\Payment $payment)
    {
        $this->payment = $payment;
        return $this;
    }
    public function getPayment()
    {
        return $this->payment;
    }
    public function getTabContent()
    {

        $tabsBlock = \Mage::getBlock('Block\Admin\Payment\Edit\Tabs');
        $tabs = $tabsBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockClassName)->setPayment($this->getPayment())->toHtml();

    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Admin_Payment');
    }

}
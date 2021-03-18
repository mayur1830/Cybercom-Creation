<?php
namespace Block\Admin\Payment\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    public $payment = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/payment/edit/tabs/form.php');
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
    public function getOptions()
    {
        return $this->payment->getStatusOptions();
    }
    public function getTitle()
    {
        if ($this->payment->id) {
            return 'Edit Payent';
        } else {
            return 'Add Payment';
        }

    }
}
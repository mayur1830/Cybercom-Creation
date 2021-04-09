<?php
namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Address extends \Block\Core\Template
{
    protected $shippingAddress = null;
    protected $billingAddress = null;
    protected $billingData = null;
    protected $shippingData = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('view/admin/customer/edit/tabs/address.php');
    }
    public function setShippingAddress()
    {
        $this->shippingAddress = \Mage::getModel('Model\Admin\Customer\Address');
        $shipping = "SELECT * FROM `customer_address` WHERE  `customer_id`= '{$this->getTableRow()->id}' AND `type`= 'Shipping';";
        $this->shippingData = $this->shippingAddress->fetchRow($shipping);
        if (!$this->shippingData) {
            return $this->shippingAddress;
        }
        $this->shippingAddress = $this->shippingData;
        return $this;
    }
    public function getShippingAddress()
    {
        if (!$this->shippingAddress) {
            $this->setShippingAddress();
        }
        return $this->shippingAddress;
    }
    public function setBillingAddress()
    {
        $this->billingAddress = \Mage::getModel('Model\Admin\Customer\Address');
        $billing = "SELECT * FROM `customer_address` WHERE  `customer_id`= '{$this->getTableRow()->id}' AND `type`= 'Billing';";
        $this->billingData = $this->billingAddress->fetchRow($billing);
        if (!$this->billingData) {
            return $this->billingAddress;
        }
        $this->billingAddress = $this->billingData;
        return $this;
    }
    public function getBillingAddress()
    {
        if (!$this->billingAddress) {
            $this->setBillingAddress();
        }
        return $this->billingAddress;
    }

}
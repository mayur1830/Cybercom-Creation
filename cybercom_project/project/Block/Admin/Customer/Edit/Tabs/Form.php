<?php
namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    public $customer = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/customer/edit/tabs/form.php');
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
    public function getOptions()
    {
        return $this->customer->getStatusOptions();
    }
    public function getTitle()
    {
        if ($this->customer->id) {
            return 'Edit Customer';
        } else {
            return 'Add Customer';
        }

    }

}
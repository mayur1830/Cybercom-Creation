<?php
namespace Block\Admin\CustomerGroup\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    public $customerGroup = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/customergroup/edit/tabs/form.php');
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
    public function getOptions()
    {
        return $this->customerGroup->getStatusOptions();
    }
    public function getTitle()
    {
        if ($this->customerGroup->id) {
            return 'Edit Customer Group';
        } else {
            return 'Add Customer Group';
        }

    }
}
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
    public function getTitle()
    {
        return 'Add/Edit Customer';

    }
    public function getCustomerGroup()
    {
        $cg = \Mage::getModel('Model\Admin\CustomerGroup');
        return $cg->fetchAll();
    }

}
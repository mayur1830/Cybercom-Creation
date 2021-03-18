<?php
namespace Block\Admin\CustomerGroup;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    public $customerGroups = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/customergroup/grid.php');
    }
    public function setCustomerGroups(\Model\Admin\CustomerGroup $customerGroups)
    {
        $this->customerGroups = $customerGroups->fetchAll();
        return $this;
    }
    public function getCustomerGroups()
    {
        return $this->customerGroups;
    }
}
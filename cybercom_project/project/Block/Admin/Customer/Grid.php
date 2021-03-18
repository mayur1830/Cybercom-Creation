<?php
namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    public $customers = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/customer/grid.php');
    }
    public function setCustomers(\Model\Admin\Customer $customers)
    {
        $query = "SELECT c.*, cg.group_name , ca.zipcode FROM customer as c LEFT JOIN customer_group as cg on c.group_id = cg.id LEFt JOIN customer_address as ca ON ca.customer_id=c.id AND ca.type='Billing'";
        $this->customers = $customers->fetchAll($query);
        return $this;

    }
    public function getCustomers()
    {
        return $this->customers;
    }

}
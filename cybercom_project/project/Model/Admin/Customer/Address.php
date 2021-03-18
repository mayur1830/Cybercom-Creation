<?php
namespace Model\Admin\Customer;

\Mage::loadFileByClassName('Model\Core\Table');
class Address extends \Model\Core\Table
{

    public function __construct()
    {
        $this->setPrimaryKey("id");
        $this->setTableName("customer_address");
    }

}
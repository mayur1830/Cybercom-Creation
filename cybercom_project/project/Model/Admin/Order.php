<?php
namespace Model\Admin;

\Mage::loadFileByClassName('Model\Core\Table');
class Order extends \Model\Core\Table
{

    public function __construct()
    {

        $this->setPrimaryKey("orderId");
        $this->setTableName("order");
    }

}
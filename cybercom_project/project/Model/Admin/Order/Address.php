<?php

namespace Model\Admin\Order;

class Address extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey("order_addressId");
        $this->setTableName("order_address");
    }
}
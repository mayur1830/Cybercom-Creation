<?php

namespace Model\Admin\Cart;

class Address extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey("cart_addressId");
        $this->setTableName("cart_address");
    }
}
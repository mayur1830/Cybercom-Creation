<?php

namespace Model\Admin\Order;

class Item extends \Model\Core\Table
{

    public function __construct()
    {
        $this->setPrimaryKey("orderItemId");
        $this->setTableName("order_item");
    }

}
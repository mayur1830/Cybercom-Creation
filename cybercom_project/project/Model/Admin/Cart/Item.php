<?php

namespace Model\Admin\Cart;

class Item extends \Model\Core\Table
{

    public function __construct()
    {
        $this->setPrimaryKey("cartItemId");
        $this->setTableName("cart_item");
    }

    public function getProduct()
    {
        if (!$this->cartItemId) {
            return false;
        }

        if (!$this->productId) {
            return false;
        }

        return \Mage::getModel('Model\Admin\Product')->load($this->id);
    }
}
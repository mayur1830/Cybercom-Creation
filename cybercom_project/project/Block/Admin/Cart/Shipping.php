<?php

namespace Block\Admin\Cart;

use Block\Core\Template;
use Mage;

class Shipping extends Template
{
    protected $shippings = [];

    protected $cart = null;
    public function __construct()
    {
        $this->setTemplate('View/admin/cart/shipping.php');
    }
    public function setCart($cart)
    {
        $this->cart = $cart;
        return $this;
    }
    public function getCart()
    {
        return $this->cart;
    }

    public function setShippings($shippings = null)
    {
        if ($shippings) {
            $this->shippings = $shippings;
            return $this;
        }

        $shipping = Mage::getModel('Model\Admin\Shipping');
        $query = "SELECT * FROM `{$shipping->getTableName()}` WHERE `status` = 1";
        $shippings = $shipping->fetchAll($query);

        if (!$shippings) {
            return false;
        }

        $this->shippings = $shippings->getData();
        return $this;
    }

    public function getShippings()
    {
        if (!$this->shippings) {
            $this->setShippings();
        }
        return $this->shippings;
    }
}
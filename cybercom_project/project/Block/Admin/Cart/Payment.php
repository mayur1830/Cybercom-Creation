<?php

namespace Block\Admin\Cart;

// use
// use Mage;

class Payment extends \Block\Core\Template
{
    protected $payments = [];
    protected $cart = null;

    public function __construct()
    {
        $this->setTemplate('View/admin/cart/payment.php');
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
    public function setPayments($payments = null)
    {
        if ($payments) {
            $this->payments = $payments;
            return $this;
        }

        $payment = \Mage::getModel('Model\Admin\Payment');
        $query = "SELECT * FROM `{$payment->getTableName()}` WHERE `status` = 1";
        $payments = $payment->fetchAll($query);

        if (!$payments) {
            return false;
        }

        $this->payments = $payments->getData();
        return $this;
    }

    public function getPayments()
    {
        if (!$this->payments) {
            $this->setPayments();
        }
        return $this->payments;
    }
}
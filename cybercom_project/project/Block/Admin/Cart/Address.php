<?php
namespace Block\Admin\Cart;

\Mage::loadFileByClassName('Block\Core\Template');
class Address extends \Block\Core\Template
{
    protected $cart = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/cart/address.php');
    }
    public function setCart($cart)
    {
        $this->cart = $cart;
        return $this;
    }
    public function getCart()
    {
        if (!$this->cart) {
            return false;
        }
        return $this->cart;
    }
    public function getBillingAddress()
    {
        $cart = $this->getCart();

        $blank = \Mage::getModel('Model\Admin\Cart\Address');
        if (!$cart) {
            return $blank;
        }
        $billingAddress = $cart->getBillingAddress();
        if ($billingAddress) {
            return $billingAddress;
        }

        $customer = $cart->getCustomer();
        if ($customer) {
            $address = $customer->getBillingAddress();

            if ($address) {
                $blank->zipcode = $address->zipcode;
                $blank->country = $address->country;
                $blank->state = $address->state;
                $blank->address = $address->address;
                $blank->city = $address->city;
                $blank->addressType = $address->type;
                $blank->cartId = $cart->cartId;
                $blank->save();
                return $blank;
            } else {
                return $blank;
            }
        } else {
            return $blank;
        }
    }

    public function getShippingAddress()
    {
        $cart = $this->getCart();

        $blank = \Mage::getModel('Model\Admin\Cart\Address');
        if (!$cart) {
            return $blank;
        }
        $shippingAddress = $cart->getShippingAddress();
        if ($shippingAddress) {
            return $shippingAddress;
        }

        $customer = $cart->getCustomer();
        if ($customer) {
            $address = $customer->getShippingAddress();

            if ($address) {
                $blank->zipcode = $address->zipcode;
                $blank->country = $address->country;
                $blank->state = $address->state;
                $blank->address = $address->address;
                $blank->city = $address->city;
                $blank->addressType = $address->type;
                $blank->cartId = $cart->cartId;
                $blank->save();
                return $blank;
            } else {
                return $blank;
            }
        } else {
            return $blank;
        }
    }

}
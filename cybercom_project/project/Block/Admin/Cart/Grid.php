<?php
namespace Block\Admin\Cart;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    protected $cart = null;
    protected $total = 0;
    protected $grandTotal = 0;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/cart/grid.php');
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
    public function getTotal()
    {
        $cart = $this->getCart();
        $cart->total = $this->total;
        $cart->save();
        $cartItem = \Mage::getModel('Model\Admin\Cart\Item');
        $query = "SELECT * FROM `cart_item` WHERE `cartId`='{$cart->cartId}'";
        $cartItems = $cartItem->fetchAll($query);

        if ($cartItems) {
            foreach ($cartItems->getData() as $key => $cartItem) {
                $this->total += $cartItem->price * $cartItem->quantity - $cartItem->discount;
            }
            $cart->total = $this->total;
            $cart->save();
            return $this->total;
        }
        return 0;

    }
    public function getShippingAmount()
    {
        $cart = $this->getCart();
        $shipping = \Mage::getModel('Model\Admin\Shipping');
        $query = "SELECT * FROM `shipping` WHERE `id`='{$cart->shippingId}'";
        $shipping = $shipping->fetchRow($query);
        if ($shipping) {
            $cart->shippingAmount = $shipping->amount;
            $cart->save();
            return $shipping->amount;
        }
        return 0;

    }
    public function grandTotal()
    {
        $cart = $this->getCart();
        $this->grandTotal += $cart->total + $cart->shippingAmount - $cart->discount;
        return $this->grandTotal;

    }

}
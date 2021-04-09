<?php
namespace Model\Admin;

\Mage::loadFileByClassName('Model\Core\Table');
class Cart extends \Model\Core\Table
{

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('cart');
        $this->setPrimaryKey('cartId');
    }
    public function getItems()
    {
        $item = \Mage::getModel('Model\Admin\Cart\Item');
        $query = "SELECT *
        FROM `{$item->getTableName()}`
        WHERE `cartId` = '{$this->cartId}'";
        if (!$collection = $item->fetchAll($query)) {
            return false;
        }
        return $collection;
    }
    public function getCustomers()
    {
        $customer = \Mage::getModel('Model\Admin\Customer');
        $customer = $customer->fetchAll();
        return $customer;
    }
    public function addToCartItem($product, $quantity = 1, $addMode = false)
    {
        $item = \Mage::getModel('Model\Admin\Cart\Item');
        $query = "SELECT * FROM `{$item->getTableName()}` WHERE `productId`={$product->id} AND `cartId`={$this->cartId}";
        $item = $item->fetchRow($query);
        if ($item) {
            $item->quantity += $quantity;
            $item->discount = $product->discount;
            $item->basePrice = $product->price;
            $item->save();
            return $this;
        } else {
            if ($this->cartId) {
                $item = \Mage::getModel('Model\Admin\Cart\Item');
                $item->cartId = $this->cartId;
                $item->productId = $product->id;
                $item->price = $product->price;
                $item->quantity = $quantity;
                $item->discount = $product->discount;
                $item->basePrice = $product->price;
                $item->createdDate = date('Y-m-d H:i:s');
                $item->save();
                return $this;
            }
        }
        return false;

    }

    public function getCustomer()
    {
        if (!$this->customerId) {

            return \Mage::getModel('Model\Admin\Customer');
        }
        $customer = \Mage::getModel('Model\Admin\Customer');
        $customer->load($this->customerId);
        return $customer;
    }
    public function getBillingAddress()
    {
        $address = \Mage::getModel('Model\Admin\Cart\Address');

        if (!$this->cartId) {
            return false;
        }

        $query = "SELECT * FROM `{$address->getTableName()}` WHERE `cartId` = '{$this->cartId}' and `addressType` = 'Billing'";

        return $address->fetchRow($query);
    }

    public function getShippingAddress()
    {
        $address = \Mage::getModel('Model\Admin\Cart\Address');

        if (!$this->cartId) {
            return false;
        }
        $query = "SELECT * FROM `{$address->getTableName()}` WHERE `cartId` = '{$this->cartId}' and `addressType` = 'Shipping'";
        return $address->fetchRow($query);
    }
}
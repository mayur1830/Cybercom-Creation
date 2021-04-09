<?php
namespace Controller\Admin;

class Order extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Order\Grid')->setOrders(\Mage::getModel('Model\Admin\Order'))->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $gridHtml,
                ],
                [
                    'selector' => '#leftHtml',
                    'html' => null,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }

    public function saveAction()
    {

        try {
            $session = \Mage::getModel('Model\Admin\Session');
            if ($session->customerId) {
                $cart = \Mage::getModel('Model\Admin\Cart');
                $query = "SELECT * FROM  `cart` WHERE `customerId`='{$session->customerId}'";
                $cart = $cart->fetchRow($query);
                $customer = \Mage::getModel('Model\Admin\Customer');
                $query = "SELECT * FROM `customer` WHERE `id`='{$cart->customerId}'";
                $customer = $customer->fetchRow($query);
                $payment = \Mage::getModel('Model\Admin\Payment');
                $query = "SELECT * FROM `payment` WHERE `id`='{$cart->paymentId}'";
                $payment = $payment->fetchRow($query);
                $shipping = \Mage::getModel('Model\Admin\Shipping');
                $query = "SELECT * FROM `shipping` WHERE `id`='{$cart->shippingId}'";
                $shipping = $shipping->fetchRow($query);
                $cartId = array_shift($cart->data);
                $order = \Mage::getModel('Model\Admin\Order');
                $order->setData($cart->data);
                $order->customerName = $customer->firstname;
                $order->paymentMethod = $payment->name;
                $order->shippingMethod = $shipping->name;
                $order = $order->save();
                if ($order) {
                    $cartItem = \Mage::getModel('Model\Admin\Cart\Item');
                    $query = "SELECT * FROM  `cart_item` WHERE `cartId`='{$cartId}'";
                    $cartItem = $cartItem->fetchRow($query);
                    $cartItemData = $cartItem->data;
                    unset($cartItemData['cartId']);
                    unset($cartItemData['cartItemId']);
                    $orderItem = \Mage::getModel('Model\Admin\Order\Item');
                    $orderItem->setData($cartItemData);
                    $orderItem->orderId = $order->orderId;
                    $cartAddress = \Mage::getModel('Model\Admin\Cart\Address');
                    $query = "SELECT * FROM  `cart_address` WHERE `cartId`='{$cartId}' AND `addressType`='Billing'";
                    $cartAddress = $cartItem->fetchRow($query);
                    $cartAddressData = $cartAddress->data;
                    unset($cartAddressData['cartId']);
                    unset($cartAddressData['cart_addressId']);
                    $orderAddress = \Mage::getModel('Model\Admin\Order\Address');
                    $orderAddress->setData($cartAddressData);
                    $orderAddress->orderId = $order->orderId;
                    $orderItem->save();
                    $orderAddress->save();
                    $cart->delete($cartId);
                    $session->destroy();
                }
                $this->gridHtmlAction();
            }

        } catch (\Exception $e) {

        }

    }
}
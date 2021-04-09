<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Cart extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart())->toHtml();
        $message = \Mage::getBlock('Block\Core\Layout\Message')->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $gridHtml,
                ],
                [
                    'selector' => '#messageHtml',
                    'html' => $message,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }

    public function addAction()
    {
        try {
            $productId = $this->getRequest()->getGet('id');

            $product = \Mage::getModel('Model\Admin\Product')->load($productId);
            $session = \Mage::getModel('Model\Admin\Session');
            if ($session->customerId) {
                $cart = $this->getCart();
                $cart->addToCartItem($product);
                $this->getMessage()->setSuccess("Item Added Successfully");
            }

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage);
        }
        $this->gridHtmlAction();
    }

    public function changeAction()
    {
        $customerId = (int) $this->getRequest()->getPost('customerId');
        $cart = $this->getCart($customerId);
        $this->gridHtmlAction();

    }
    public function deleteAction()
    {
        try {

            $id = $this->getRequest()->getGet('id');
            if (!(int) $id) {
                throw new \Exception('Invalid ID');
            }
            $cartItem = \Mage::getModel('Model\Admin\Cart\Item');
            if (!$cartItem->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();

    }
    protected function getCart($customerId = null)
    {

        $cart = \Mage::getModel('Model\Admin\Cart');
        $session = \Mage::getModel('Model\Admin\Session');
        if ($customerId) {
            $session->customerId = $customerId;

        }

        if (!$customerId && !$session->customerId) {

            return $cart;
        }

        $cart = $cart->load($session->customerId, 'customerId');

        if (!$cart) {
            // echo "hii";
            // die();
            $cart = \Mage::getModel('Model\Admin\Cart');
            $cart->customerId = $customerId;
            $cart->createdDate = date('Y:m:d H:i:s');
            $cart->save();

        }

        return $cart;

    }
    public function saveAction()
    {

        try {

            $quantityData = $this->getRequest()->getPost('quantity');
            $priceData = $this->getRequest()->getPost('price');
            $discount = $this->getRequest()->getPost('discount');
            if ($discount) {
                $cart = $this->getCart();
                $cart->discount = $discount;
                $cart->save();
            }
            if ($quantityData) {
                foreach ($quantityData as $cartItemId => $value) {
                    $item = \Mage::getModel('Model\Admin\Cart\Item')->load($cartItemId);
                    $item->quantity = $value;
                    $item = $item->save();
                }
            }
            if ($priceData) {
                foreach ($priceData as $cartItemId => $value) {
                    $item = \Mage::getModel('Model\Admin\Cart\Item')->load($cartItemId);
                    $item->price = $value;
                    $item = $item->save();
                }
            }

            $this->gridHtmlAction();

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }

    }
    public function saveBillingAddressAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception('Invalid Request.');
            }

            $data = $this->getRequest()->getPost('billing');

            if (!$data) {
                throw new \Exception('Invalid data.');
            }

            $cart = $this->getCart();
            if ($cart->getBillingAddress()) {
                $cart->getBillingAddress()->setData($data)->save();
            } else {
                $address = \Mage::getModel('Model\Admin\Cart\Address');
                $address->setData($data);
                $address->cartId = $cart->cartId;
                $address->save();
            }

            if ($this->getRequest()->getPost('BillingBook')) {
                $customer = $cart->getCustomer();
                $customerAddress = $customer->getBillingAddress();
                if ($customerAddress) {
                    $customerAddress->setData($data);
                    $customerAddress->save();
                } else {
                    $customerAddress = \Mage::getModel('Model\Admin\Customer\Address');
                    $cartAddress = $cart->getBillingAddress();
                    $customerAddress->zipcode = $cartAddress->zipcode;
                    $customerAddress->country = $cartAddress->country;
                    $customerAddress->state = $cartAddress->state;
                    $customerAddress->address = $cartAddress->address;
                    $customerAddress->city = $cartAddress->city;
                    $customerAddress->type = $cartAddress->addressType;
                    $customerAddress->customer_id = $cart->customerId;
                    $customerAddress->save();
                }
            }

            if ($this->getRequest()->getPost('sameAsShipping')) {
                if ($cart->getShippingAddress()) {

                    $shipping = $cart->getShippingAddress();
                    $billing = $cart->getBillingAddress();
                    $billing->zipcode = $shipping->zipcode;
                    $billing->country = $shipping->country;
                    $billing->state = $shipping->state;
                    $billing->address = $shipping->address;
                    $billing->city = $shipping->city;
                    $billing->cartId = $cart->cartId;
                    $billing->save();
                } else {
                    $shipping = \Mage::getModel('Model\Admin\Cart\Address');
                    $billing = $cart->getBillingAddress();

                    $shipping->zipcode = $billing->zipcode;
                    $shipping->country = $billing->country;
                    $shipping->state = $billing->state;
                    $shipping->address = $billing->address;
                    $shipping->city = $billing->city;
                    $shipping->cartId = $cart->cartId;
                    $shipping->addressType = 'Shipping';
                    $shipping->save();
                }
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();
    }
    public function saveShippingAddressAction()
    {

        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception('Invalid Request.');
            }

            $data = $this->getRequest()->getPost('shipping');

            if (!$data) {
                throw new \Exception('Invalid data.');
            }

            $cart = $this->getCart();
            if ($cart->getShippingAddress()) {
                $cart->getShippingAddress()->setData($data)->save();
            } else {
                $address = \Mage::getModel('Model\Admin\Cart\Address');
                $address->setData($data);
                $address->cartId = $cart->cartId;
                $address->save();
            }

            if ($this->getRequest()->getPost('ShippingBook')) {
                $customer = $cart->getCustomer();
                $customerAddress = $customer->getShippingAddress();
                if ($customerAddress) {
                    $customerAddress->setData($data);
                    $customerAddress->save();
                } else {
                    $customerAddress = \Mage::getModel('Model\Admin\Customer\Address');
                    $cartAddress = $cart->getShippingAddress();
                    $customerAddress->zipcode = $cartAddress->zipcode;
                    $customerAddress->country = $cartAddress->country;
                    $customerAddress->state = $cartAddress->state;
                    $customerAddress->address = $cartAddress->address;
                    $customerAddress->city = $cartAddress->city;
                    $customerAddress->type = $cartAddress->addressType;
                    $customerAddress->customer_id = $cart->customerId;
                    $customerAddress->save();
                }
            }

            if ($this->getRequest()->getPost('sameAsBilling')) {
                if ($cart->getBillingAddress()) {

                    $shipping = $cart->getShippingAddress();
                    $billing = $cart->getBillingAddress();
                    $shipping->zipcode = $billing->zipcode;
                    $shipping->country = $billing->country;
                    $shipping->state = $billing->state;
                    $shipping->address = $billing->address;
                    $shipping->city = $billing->city;
                    $shipping->cartId = $cart->cartId;
                    $shipping->save();
                } else {
                    $billing = \Mage::getModel('Model\Admin\Cart\Address');
                    $shipping = $cart->getShippingAddress();

                    $billing->zipcode = $shipping->zipcode;
                    $billing->country = $shipping->country;
                    $billing->state = $shipping->state;
                    $billing->address = $shipping->address;
                    $billing->city = $shipping->city;
                    $billing->cartId = $cart->cartId;
                    $billing->addressType = 'Billing';
                    $billing->save();
                }
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();
    }
    public function saveShippingMethodAction()
    {
        try {
            $shipping = $this->getRequest()->getPost('shipping');
            $cart = $this->getCart();
            $cart->shippingId = $shipping;
            $cart->save();
            $this->gridHtmlAction();

        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
    public function savePaymentMethodAction()
    {
        try {
            $payment = $this->getRequest()->getPost('payment');
            $cart = $this->getCart();
            $cart->paymentId = $payment;
            $cart->save();
            $this->gridHtmlAction();

        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

}
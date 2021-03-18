<?php
namespace Controller\Admin\Customer;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Address extends \Controller\Core\Admin
{
    public function saveAction()
    {
        try {
            $billing = \Mage::getModel('Model\Admin\Customer\Address');
            $shipping = \Mage::getModel('Model\Admin\Customer\Address');
            if ($id = $this->getRequest()->getGet('id')) {
                $query = "SELECT * FROM `customer_address` WHERE  `customer_id`= '{$id}' AND `type`= 'Billing';";
                if (!$billing->fetchRow($query)) {
                    $billing->type = 'Billing';
                    $billing->customer_id = $id;
                    $billingData = $this->getRequest()->getPost('billing');
                    $billing->setData($billingData);
                    $billing->save();
                } else {
                    $billingData = $this->getRequest()->getPost('billing');
                    $billing->setData($billingData);
                    $billing->save();
                }
                $query = "SELECT * FROM `customer_address` WHERE  `customer_id`= '{$id}' AND `type`= 'Shipping';";
                if (!$shipping->fetchRow($query)) {
                    $shipping->type = 'Shipping';
                    $shipping->customer_id = $id;
                    $shippingData = $this->getRequest()->getPost('shipping');
                    $shipping->setData($shippingData);
                    $shipping->save();

                } else {
                    $shippingData = $this->getRequest()->getPost('shipping');
                    $shipping->setData($shippingData);
                    $shipping->save();
                }
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', 'Admin_Customer', [], true);
        }
        $this->redirect('grid', 'Admin_Customer', [], true);

    }
}
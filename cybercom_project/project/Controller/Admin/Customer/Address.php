<?php
namespace Controller\Admin\Customer;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Address extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Customer\Grid')->setCustomers(\Mage::getModel('Model\Admin\Customer'))->toHtml();
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
        $this->gridHtmlAction();
        //$this->redirect('grid', 'Admin_Customer', [], true);

    }
}
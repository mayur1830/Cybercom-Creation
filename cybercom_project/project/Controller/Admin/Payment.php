<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Payment extends \Controller\Core\Admin
{
    protected $modelPayment = null;
    public function __construct()
    {
        parent::__construct();
        $this->setModelPayment();
    }
    public function setModelPayment($payment = null)
    {
        if (!$payment) {
            $payment = \Mage::getModel('Model\Admin\Payment');
        }
        $this->modelPayment = $payment;
        return $this;
    }
    public function getModelPayment()
    {
        if (!$this->modelPayment) {
            $this->setModelPayment();
        }
        return $this->modelPayment;
    }
    public function gridAction()
    {
        try {
            $grid = \Mage::getBlock('Block\Admin\Payment\Grid');
            $grid->setPayments(\Mage::getModel('Model\Admin\Payment'));
            $this->getLayout()->getChild('content')->addChild($grid, 'grid');
            $this->renderLayout();
        } catch (\Exception $e) {
            echo $e->getMessage();
            $this->redirect('grid', null, [], true);
        }

    }
    public function formAction()
    {
        try {
            $payment = \Mage::getModel('Model\Admin\Payment');
            if ($id = (int) $this->getRequest()->getGet('id')) {
                $payment = $payment->load($id);
                if (!$payment) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Payment\Edit')->setPayment($payment);
            $leftcontent = \Mage::getBlock('Block\Admin\Payment\Edit\Tabs');
            $this->getLayout()->getChild('content')->addChild($edit, 'edit');
            $this->getLayout()->getChild('left')->addChild($leftcontent, 'tab');
            $this->renderLayout();

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function saveAction()
    {
        try {

            if ($id = $this->getRequest()->getGet('id')) {
                $payment = $this->getModelPayment()->load($id);
                if (!$payment) {
                    throw new \Exception('Please Enter Valid ID');
                }
                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {
                $this->getModelPayment()->createdDate = date('Y-m-d H-i-s');

                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $paymentData = $this->getRequest()->getPost('payment');
            $this->getModelPayment()->setData($paymentData);
            $this->getModelPayment()->save();

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, [], true);
        }

        $this->redirect('grid', null, [], true);
    }

    public function deleteAction()
    {
        try {

            $id = $this->getRequest()->getGet('id');
            if (!(int) $id) {
                throw new \Exception('Invalid ID');
            }
            if (!$this->getModelPayment()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, [], true);
    }
}
<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Customer extends \Controller\Core\Admin
{
    protected $modelCustomer = null;
    public function __construct()
    {
        parent::__construct();
        $this->setModelCustomer();
    }
    public function setModelCustomer($customer = null)
    {
        if (!$customer) {
            $customer = \Mage::getModel('Model\Admin\Customer');
        }
        $this->modelCustomer = $customer;
        return $this;
    }
    public function getModelCustomer()
    {
        if (!$this->modelCustomer) {
            $this->setModelCustomer();
        }
        return $this->modelCustomer;
    }
    public function gridAction()
    {
        try {
            $grid = \Mage::getBlock('Block\Admin\Customer\Grid');
            $grid->setCustomers(\Mage::getModel('Model\Admin\Customer'));
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
            $customer = \Mage::getModel('Model\Admin\Customer');
            if ($id = (int) $this->getRequest()->getGet('id')) {
                $customer = $customer->load($id);
                if (!$customer) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Customer\Edit')->setCustomer($customer);
            $leftcontent = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs');
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
                $customer = $this->getModelCustomer()->load($id);
                if (!$customer) {
                    throw new \Exception('Please Enter Valid ID');
                }
                $this->getModelCustomer()->updatedDate = date('Y-m-d H-i-s');
                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {
                $this->getModelCustomer()->createdDate = date('Y-m-d H-i-s');
                $this->getModelCustomer()->updatedDate = date('Y-m-d H-i-s');

                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $customerData = $this->getRequest()->getPost('customer');
            $this->getModelCustomer()->setData($customerData);
            $this->getModelCustomer()->save();
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
            if (!$this->getModelCustomer()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, [], true);
    }
}
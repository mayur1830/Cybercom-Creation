<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class CustomerGroup extends \Controller\Core\Admin
{
    protected $modelCustomerGroup = null;
    public function __construct()
    {
        parent::__construct();
        $this->setModelCustomerGroup();
    }
    public function setModelCustomerGroup($customerGroup = null)
    {
        if (!$customerGroup) {
            $customerGroup = \Mage::getModel('Model\Admin\CustomerGroup');
        }
        $this->modelCustomerGroup = $customerGroup;
        return $this;
    }
    public function getModelCustomerGroup()
    {
        if (!$this->modelCustomerGroup) {
            $this->setModelCustomerGroup();
        }
        return $this->modelCustomerGroup;
    }
    public function gridAction()
    {
        try {
            $grid = \Mage::getBlock('Block\Admin\CustomerGroup\Grid');
            $grid->setCustomerGroups(\Mage::getModel('Model\Admin\CustomerGroup'));
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
            $customerGroup = \Mage::getModel('Model\Admin\CustomerGroup');
            if ($id = (int) $this->getRequest()->getGet('id')) {
                $customerGroup = $customerGroup->load($id);
                if (!$customerGroup) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\CustomerGroup\Edit')->setCustomerGroup($customerGroup);
            $leftcontent = \Mage::getBlock('Block\Admin\CustomerGroup\Edit\Tabs');
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
                $Customergroup = $this->getModelCustomerGroup()->load($id);
                if (!$Customergroup) {
                    throw new \Exception('Please Enter Valid ID');
                }
                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {
                $this->getModelCustomerGroup()->createdDate = date('Y-m-d H-i-s');

                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $CustomergroupData = $this->getRequest()->getPost('customergroup');
            $this->getModelCustomerGroup()->setData($CustomergroupData);
            $this->getModelCustomerGroup()->save();

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
            if (!$this->getModelCustomerGroup()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, [], true);
    }
}
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
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $left = $layout->getChild('left');
        echo $layout->toHtml();
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
            $edit = \Mage::getBlock('Block\Admin\Customer\Edit')->setTableRow($customer)->toHtml();
            $leftcontent = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs')->toHtml();
            $response = [
                'status' => 'success',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $edit,
                    ],
                    [
                        'selector' => '#leftHtml',
                        'html' => $leftcontent,
                    ],
                ],
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
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
            $this->gridHtmlAction();

        }

        $this->gridHtmlAction();

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
        $this->gridHtmlAction();

    }
}
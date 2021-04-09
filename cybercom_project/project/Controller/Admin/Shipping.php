<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Shipping extends \Controller\Core\Admin
{
    protected $modelShipping = null;
    public function __construct()
    {
        parent::__construct();
        $this->setModelShipping();
    }
    public function setModelShipping($shipping = null)
    {
        if (!$shipping) {
            $shipping = \Mage::getModel('Model\Admin\Shipping');
        }
        $this->modelShipping = $shipping;
        return $this;
    }
    public function getModelShipping()
    {
        if (!$this->modelShipping) {
            $this->setModelShipping();
        }
        return $this->modelShipping;
    }
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Shipping\Grid')->setShippings(\Mage::getModel('Model\Admin\Shipping'))->toHtml();
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
            $shipping = \Mage::getModel('Model\Admin\Shipping');
            if ($id = (int) $this->getRequest()->getGet('id')) {
                $shipping = $shipping->load($id);
                if (!$shipping) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Shipping\Edit')->setTableRow($shipping)->toHtml();
            $leftcontent = \Mage::getBlock('Block\Admin\Shipping\Edit\Tabs')->toHtml();
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
                $shipping = $this->getModelShipping()->load($id);
                if (!$shipping) {
                    throw new \Exception('Please Enter Valid ID');
                }
                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {
                $this->getModelShipping()->createdDate = date('Y-m-d H-i-s');

                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $shippingData = $this->getRequest()->getPost('shipping');
            $this->getModelShipping()->setData($shippingData);
            $this->getModelShipping()->save();

        } catch (\Exception $e) {
            echo "hello";
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
            if (!$this->getModelShipping()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();
    }
}
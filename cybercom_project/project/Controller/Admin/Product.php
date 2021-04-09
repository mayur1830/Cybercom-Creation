<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Product extends \Controller\Core\Admin
{
    protected $modelProduct = null;
    public function __construct()
    {
        parent::__construct();
        $this->setModelProduct();
    }
    public function setModelProduct($product = null)
    {
        if (!$product) {
            $product = \Mage::getModel('Model\Admin\Product');
        }
        $this->modelProduct = $product;
        return $this;
    }
    public function getModelProduct()
    {
        if (!$this->modelProduct) {
            $this->setModelProduct();
        }
        return $this->modelProduct;
    }
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Product\Grid')->setProducts(\Mage::getModel('Model\Admin\Product'))->toHtml();
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
            $product = \Mage::getModel('Model\Admin\Product');
            if ($id = (int) $this->getRequest()->getGet('id')) {
                $product = $product->load($id);
                if (!$product) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Product\Edit')->setTableRow($product)->toHtml();
            $response = [
                'status' => 'success',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $edit,
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
                $product = $this->getModelProduct()->load($id);
                if (!$product) {
                    throw new \Exception('Please Enter Valid ID');
                }
                $this->getModelProduct()->updatedDate = date('Y-m-d H-i-s');
                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {
                $this->getModelProduct()->createdDate = date('Y-m-d H-i-s');
                $this->getModelProduct()->updatedDate = date('Y-m-d H-i-s');
                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $productData = $this->getRequest()->getPost('product');
            $this->getModelProduct()->setData($productData);
            $this->getModelProduct()->save();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
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
            if (!$this->getModelProduct()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();
    }
}
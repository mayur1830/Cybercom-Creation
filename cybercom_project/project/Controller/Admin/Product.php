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
    public function gridAction()
    {
        try {
            $grid = \Mage::getBlock('Block\Admin\Product\Grid');
            $grid->setProducts(\Mage::getModel('Model\Admin\Product'));
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
            $product = \Mage::getModel('Model\Admin\Product');
            if ($id = (int) $this->getRequest()->getGet('id')) {
                $product = $product->load($id);
                if (!$product) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Product\Edit')->setProduct($product);
            $leftcontent = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
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
            if (!$this->getModelProduct()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, [], true);
    }
}
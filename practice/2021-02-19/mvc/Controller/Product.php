<?php

require_once './Model/Core/Adapter.php';
require_once './Controller/Core/Admin.php';
require_once './Model/Product.php';

class Product extends Admin
{
    protected $product = [];
    protected $model_product = Null;
    public function __construct()
    {
        parent::__construct();
        $this->setModel_Product();
    }
    public function setModel_Product($product = null)
    {
        if (!$product) {
            $product = new Model_Product();
        }
        $this->model_product = $product;
        return $this;
    }
    public function getModel_Product()
    {
        if (!$this->model_product) {
            $this->setModel_Product();
        }
        return $this->model_product;
    }

    public function gridAction()
    {

        $this->setProduct($this->getModel_Product()->fetchAll());


        require_once './View/product/grid.php';
    }
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }
    public function getProduct()
    {
        return $this->product;
    }

    public function productinsertAction()
    {
        require_once './View/product/productinsert.php';
    }
    public function productupdateAction()
    {
        try {

            $id = (int) $this->getRequest()->getGet('id');
            if (!$id) {
                throw new Exception("Invalid Id");
            }

            $product = $this->getModel_Product();
            echo "<pre>";
            print_r($product);
            die();
            $product = $product->load($id);
            $this->setModel_Product($product);
            echo "<pre>";
            echo  $this->getModel_Product()->id;
            print_r($this->getModel_Product());



            require_once './View/product/productupdate.php';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function saveAction()
    {
        try {
            $product_data = $this->getRequest()->getPost('product');


            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }

            $this->getModel_Product()->createdDate = date('Y-m-d H-i-s');
            $this->getModel_Product()->updatedDate = date('Y-m-d H-i-s');
            $this->getModel_Product()->setData($product_data);
            print_r($this->getModel_Product()->save());
            $this->redirect('grid', 'Product');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function updateAction()
    {
        $product_data = $this->getRequest()->getPost('product');
        $this->getModel_Product()->updatedDate = date('Y-m-d H-i-s');
        $this->getModel_Product()->setData($product_data);
        $this->getModel_Product()->save();
        $this->redirect('grid', 'Product');
    }
    public function productdeleteAction()
    {
        $id = $_GET['id'];
        $adapter = new Adapter();
        $adapter->delete("DELETE FROM `product` where `id`=$id");
        $this->redirect('grid', 'Product');
    }
}
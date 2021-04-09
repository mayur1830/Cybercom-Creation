<?php
namespace Block\Admin\Product;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/product/grid.php');
    }
    public function setProducts(\Model\Admin\Product $products)
    {
        $this->products = $products->fetchAll();
        return $this;
    }
    public function getProducts()
    {
        return $this->products;
    }

}
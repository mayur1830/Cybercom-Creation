<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    protected $product = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/product/edit/tabs/form.php');
    }
    public function setProduct(\Model\Admin\Product $product)
    {
        $this->product = $product;
        return $this;
    }
    public function getProduct()
    {
        return $this->product;
    }
    public function getOptions()
    {
        return $this->product->getStatusOptions();
    }
    public function getTitle()
    {
        if ($this->product->id) {
            return 'Edit Product';
        } else {
            return 'Add Product';
        }

    }

}
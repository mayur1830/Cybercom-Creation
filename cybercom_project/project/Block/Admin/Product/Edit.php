<?php
namespace Block\Admin\Product;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $product = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/product/form.php');
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
    public function getTabContent()
    {
        $tabsBlock = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
        $tabs = $tabsBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockClassName)->setProduct($this->getProduct())->toHtml();
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Admin_Product');
    }

}
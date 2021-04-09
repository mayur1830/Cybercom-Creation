<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Media extends \Block\Core\Template
{
    protected $product = null;
    protected $productMedia = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/product/edit/tabs/media.php');
    }

    public function setProductMedia()
    {
        $media = \Mage::getModel('Model\Admin\Product\Media');
        $query = "SELECT * FROM `{$media->getTableName()}` WHERE `productid`= {$this->getTableRow()->id}";
        $this->productMedia = $media->fetchAll($query);
        return $this;

    }
    public function getProductMedia()
    {
        if (!$this->productMedia) {
            $this->setProductMedia();
        }
        return $this->productMedia;
    }
    public function getTitle()
    {
        return 'Product Media';
    }

}
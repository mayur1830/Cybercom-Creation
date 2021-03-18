<?php
namespace Block\Admin\CmsPage;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    public $cmsPages = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/cmspage/grid.php');
    }
    public function setCmsPages(\Model\Admin\CmsPage $cmsPages)
    {
        $this->cmsPages = $cmsPages->fetchAll();
        return $this;
    }
    public function getCmsPages()
    {
        return $this->cmsPages;
    }
}
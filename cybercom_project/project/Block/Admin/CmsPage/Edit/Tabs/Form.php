<?php
namespace Block\Admin\CmsPage\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    public $cmsPage = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/cmspage/edit/tabs/form.php');
    }
    public function setCmsPage(\Model\Admin\CmsPage $cmsPage)
    {
        $this->cmsPage = $cmsPage;
        return $this;
    }
    public function getCmsPage()
    {
        return $this->cmsPage;
    }
    public function getOptions()
    {
        return $this->cmsPage->getStatusOptions();
    }
    public function getTitle()
    {
        if ($this->cmsPage->id) {
            return 'Edit CmsPage';
        } else {
            return 'Add CmsPage';
        }

    }
}
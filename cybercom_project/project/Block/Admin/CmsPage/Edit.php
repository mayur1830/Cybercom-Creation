<?php
namespace Block\Admin\CmsPage;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $cmsPage = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/cmspage/form.php');
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
    public function getTabContent()
    {
        $tabsBlock = \Mage::getBlock('Block\Admin\CmsPage\Edit\Tabs');
        $tabs = $tabsBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockClassName)->setCmsPage($this->getCmsPage())->toHtml();

    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Admin_CmsPage');
    }

}
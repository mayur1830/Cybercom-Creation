<?php
namespace Block\Admin\Category;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $category = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/category/form.php');
    }
    public function setCategory(\Model\Admin\Category $category)
    {
        $this->category = $category;
        return $this;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getTabContent()
    {
        $tabsBlock = \Mage::getBlock('Block\Admin\Category\Edit\Tabs');
        $tabs = $tabsBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockClassName)->setCategory($this->getCategory())->toHtml();

    }

    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Admin_Category');
    }

}
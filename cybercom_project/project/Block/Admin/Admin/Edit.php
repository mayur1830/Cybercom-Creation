<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    protected $admin = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/admin/form.php');
    }
    public function setAdmin(\Model\Admin\Admin $admin)
    {
        $this->admin = $admin;
        return $this;
    }
    public function getAdmin()
    {
        return $this->admin;
    }
    public function getTabContent()
    {
        $tabsBlock = \Mage::getBlock('Block\Admin\Admin\Edit\Tabs');
        $tabs = $tabsBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabsBlock->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockClassName)->setAdmin($this->getAdmin())->toHtml();

    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Admin_Admin');
    }

}
<?php
namespace Block\Admin\CmsPage\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->prepareTab();
    }
    public function prepareTab()
    {
        $this->addTab('cmspage', ['label' => 'CmsPage Information', 'block' => 'Block\Admin\CmsPage\Edit\Tabs\Form']);
        $this->setDefaultTab('cmspage');
        return $this;
    }

}
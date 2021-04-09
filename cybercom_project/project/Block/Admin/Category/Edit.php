<?php
namespace Block\Admin\Category;

\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Category\Edit\Tabs'));
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Category');
    }
    public function getFormId()
    {
        return "categoryForm";
    }

}
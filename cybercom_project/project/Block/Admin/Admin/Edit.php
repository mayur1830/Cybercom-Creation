<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Admin\Edit\Tabs'));
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Admin');
    }
    public function getFormId()
    {
        return "adminForm";
    }

}
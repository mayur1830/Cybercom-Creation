<?php
namespace Block\Admin\ConfigGroup;

\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\ConfigGroup\Edit\Tabs'));
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'ConfigGroup');
    }
    public function getFormId()
    {
        return "configgroupForm";
    }

}
<?php
namespace Block\Admin\Attribute;

\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Attribute\Edit\Tabs'));
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Attribute');
    }
    public function getFormId()
    {
        return "attributeForm";
    }

}
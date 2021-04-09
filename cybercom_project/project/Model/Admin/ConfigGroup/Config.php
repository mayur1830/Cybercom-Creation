<?php
namespace Model\Admin\ConfigGroup;

\Mage::loadFileByClassName('Model\Core\Table');
class Config extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey("configId");
        $this->setTableName("config");
    }

}
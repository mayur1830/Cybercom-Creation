<?php
namespace Model\Admin;

\Mage::loadFileByClassName('Model\Core\Table');
class ConfigGroup extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey("groupId");
        $this->setTableName("config_group");
    }
    public function getConfigs()
    {
        $cg = \Mage::getModel('Model\Admin\ConfigGroup\Config');
        $query = "SELECT * FROM `{$cg->getTableName()}` WHERE `groupId` = '{$this->groupId}'";
        return $cg->fetchAll($query);
    }
}
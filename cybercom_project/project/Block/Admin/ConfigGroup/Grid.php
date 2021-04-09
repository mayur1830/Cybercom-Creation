<?php
namespace Block\Admin\ConfigGroup;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    public $configGroups = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/configgroup/grid.php');
    }
    public function setConfigGroups(\Model\Admin\ConfigGroup $configGroups)
    {
        $this->configGroups = $configGroups->fetchAll();
        return $this;
    }
    public function getConfigGroups()
    {
        return $this->configGroups;
    }
}
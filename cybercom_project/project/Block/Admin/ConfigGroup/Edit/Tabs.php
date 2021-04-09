<?php
namespace Block\Admin\ConfigGroup\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{
    protected $defaultTab = null;
    public function __construct()
    {
        parent::__construct();
        $this->prepareTab();
    }
    public function prepareTab()
    {
        $this->addTab('configGroup', ['label' => 'ConfigGroup Information', 'block' => 'Block\Admin\ConfigGroup\Edit\Tabs\Form']);
        $this->addTab('config', ['label' => 'Configuration', 'block' => 'Block\Admin\ConfigGroup\Edit\Tabs\Config']);
        $this->setDefaultTab('configGroup');
        return $this;
    }

}
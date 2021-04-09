<?php
namespace Block\Admin\Attribute\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{

    protected $tabs = [];
    public function __construct()
    {
        parent::__construct();
        $this->prepareTab();
    }
    public function prepareTab()
    {
        $this->addTab('attribute', ['label' => 'Attribute Information', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Form']);
        $this->addTab('options', ['label' => 'Options Information', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Option']);
        $this->setDefaultTab('attribute');
        return $this;
    }

}
<?php
namespace Block\Admin\Shipping\Edit;

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
        $this->addTab('shipping', ['label' => 'Shipping Information', 'block' => 'Block\Admin\Shipping\Edit\Tabs\Form']);
        $this->setDefaultTab('shipping');
        return $this;
    }

}
<?php
namespace Block\Admin\Payment\Edit;

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
        $this->addTab('payment', ['label' => 'Payment Information', 'block' => 'Block\Admin\Payment\Edit\Tabs\Form']);
        $this->setDefaultTab('payment');
        return $this;
    }

}
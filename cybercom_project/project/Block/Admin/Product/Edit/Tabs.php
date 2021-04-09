<?php
namespace Block\Admin\Product\Edit;

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
        $this->addTab('product', ['label' => 'Product Information', 'block' => 'Block\Admin\Product\Edit\Tabs\Form']);
        $this->addTab('media', ['label' => 'Product Media', 'block' => 'Block\Admin\Product\Edit\Tabs\Media']);
        $this->addTab('groupPrice', ['label' => 'Product Group Price', 'block' => 'Block\Admin\Product\Edit\Tabs\GroupPrice']);
        $this->setDefaultTab('product');
        return $this;
    }

}
<?php
namespace Block\Admin\Attribute\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Option extends \Block\Core\Template
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/attribute/edit/tabs/option.php');
    }

}
<?php
namespace Block\Admin\ConfigGroup\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Config extends \Block\Core\Template
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/configgroup/edit/tabs/config.php');
    }

}
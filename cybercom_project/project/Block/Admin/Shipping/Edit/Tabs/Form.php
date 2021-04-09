<?php
namespace Block\Admin\Shipping\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./view/admin/shipping/edit/tabs/form.php');
    }
    public function getTitle()
    {
        return 'Add/Edit Shipping';

    }
}
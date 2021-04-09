<?php
namespace Block\Admin\Payment\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/payment/edit/tabs/form.php');
    }
    public function getTitle()
    {
        return 'Add/Edit Payment';

    }
}
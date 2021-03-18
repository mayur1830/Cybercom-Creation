<?php
namespace Block\Admin\Admin\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    public $admin = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/admin/edit/tabs/form.php');
    }

    public function setAdmin(\Model\Admin\Admin $admin)
    {
        $this->admin = $admin;
        return $this;
    }
    public function getAdmin()
    {
        return $this->admin;
    }
    public function getOptions()
    {
        return $this->admin->getStatusOptions();
    }
    public function getTitle()
    {
        if ($this->admin->id) {
            return 'Edit Admin';
        } else {
            return 'Add Admin';
        }

    }
}
<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    public $admins = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/admin/grid.php');
    }
    public function setAdmins(\Model\Admin\Admin $admins)
    {
        $this->admins = $admins->fetchAll();
        return $this;
    }
    public function getAdmins()
    {
        return $this->admins;
    }

}
<?php
namespace Block\Admin\Shipping\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    public $shipping = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./view/admin/shipping/edit/tabs/form.php');
    }
    public function setShipping(\Model\Admin\Shipping $shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }
    public function getShipping()
    {
        return $this->shipping;
    }
    public function getOptions()
    {
        return $this->shipping->getStatusOptions();
    }
    public function getTitle()
    {
        if ($this->shipping->id) {
            return 'Edit Shipping';
        } else {
            return 'Add Shipping';
        }

    }
}
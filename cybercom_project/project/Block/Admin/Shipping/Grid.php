<?php
namespace Block\Admin\Shipping;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    public $shippings = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/shipping/grid.php');
    }
    public function setShippings(\Model\Admin\Shipping $shippings)
    {
        $this->shippings = $shippings->fetchAll();
        return $this;
    }
    public function getShippings()
    {
        return $this->shippings;
    }
}
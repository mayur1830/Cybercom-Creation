<?php
namespace Block\Admin\Order;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/order/grid.php');
    }
    public function setOrders(\Model\Admin\Order $orders)
    {
        $this->orders = $orders->fetchAll();
        return $this;
    }
    public function getOrders()
    {
        return $this->orders;
    }

}
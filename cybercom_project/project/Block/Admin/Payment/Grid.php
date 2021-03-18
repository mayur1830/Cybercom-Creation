<?php
namespace Block\Admin\Payment;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    public $payments = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/payment/grid.php');
    }
    public function setPayments(\Model\Admin\Payment $payments)
    {
        $this->payments = $payments->fetchAll();
        return $this;
    }
    public function getPayments()
    {
        return $this->payments;
    }

}
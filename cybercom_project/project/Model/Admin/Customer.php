<?php
namespace Model\Admin;

\Mage::loadFileByClassName('Model\Core\Table');
class Customer extends \Model\Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function __construct()
    {

        $this->setPrimaryKey("id");
        $this->setTableName("customer");
    }
    public function getStatusOptions()
    {
        return [

            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable',

        ];
    }
    public function getBillingAddress()
    {

        $address = \Mage::getModel('Model\Admin\Customer\Address');
        $query = "SELECT * FROM `{$address->getTableName()}` WHERE `customer_id`='{$this->id}' AND `type`='Billing'";
        $address = $address->fetchRow($query);
        return $address;
    }
    public function getShippingAddress()
    {
        $address = \Mage::getModel('Model\Admin\Customer\Address');
        $query = "SELECT * FROM `{$address->getTableName()}` WHERE `customer_id`='{$this->id}' AND `type`='Shipping'";
        $address = $address->fetchRow($query);
        return $address;
    }
}
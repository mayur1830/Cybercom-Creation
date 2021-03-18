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
}
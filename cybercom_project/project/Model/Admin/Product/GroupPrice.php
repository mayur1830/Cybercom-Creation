<?php
namespace Model\Admin\Product;

\Mage::loadFileByClassName('Model\Core\Table');

class GroupPrice extends \Model\Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function __construct()
    {
        $this->setTableName("product_group_price");
        $this->setPrimaryKey("entityid");
    }

    public function getStatusOption()
    {
        return [

            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable',

        ];
    }

}
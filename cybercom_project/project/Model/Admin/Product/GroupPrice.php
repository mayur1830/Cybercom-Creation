<?php
namespace Model\Admin\Product;

\Mage::loadFileByClassName('Model\Core\Table');

class GroupPrice extends \Model\Core\Table
{

    public function __construct()
    {
        $this->setTableName("product_group_price");
        $this->setPrimaryKey("entityid");
    }

}
<?php
namespace Model\Admin\Product;

\Mage::loadFileByClassName('Model\Core\Table');
class Media extends \Model\Core\Table
{

    public function __construct()
    {

        $this->setPrimaryKey("id");
        $this->setTableName("product_media");
    }

}
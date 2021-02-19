<?php
require_once "./Model/Core/Table.php";
class Model_Product extends Model_Table
{
    public function __construct()
    {

        $this->setPrimaryKey("id");
        $this->setTableName("product");
    }
}
<?php
namespace Block\Admin\Attribute;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/attribute/grid.php');
    }
    public function setAttributes(\Model\Admin\Attribute $attribute)
    {
        $this->attribute = $attribute->fetchAll();
        return $this;
    }
    public function getAttributes()
    {
        return $this->attribute;
    }

}
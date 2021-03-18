<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class GroupPrice extends \Block\Core\Template
{
    protected $product = null;
    public function __construct()
    {
        $this->setTemplate('View/admin/product/edit/tabs/groupPrice.php');
    }
    public function setProduct(\Model\Admin\Product $product)
    {
        $this->product = $product;
        return $this;
    }
    public function getProduct()
    {
        return $this->product;
    }
    public function getCustomerGroups()
    {
        $customerGroup = \Mage::getModel('Model\Admin\CustomerGroup');
        $query = "SELECT cg.*, pgp.productid,pgp.entityid,pgp.price as groupPrice,
		if(pgp.price IS NULL , pgp.price , p.price) price
		FROM `{$customerGroup->getTableName()}` cg
		LEFT JOIN `product_group_price` pgp
			ON pgp.customerGroupid = cg.id
				AND pgp.productid = '{$this->product->id}'
		LEFT JOIN product p
				ON pgp.productid = p.id
		";
        return $customerGroup->fetchAll($query);

    }

}
<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class GroupPrice extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('View/admin/product/edit/tabs/groupPrice.php');
    }

    public function getCustomerGroups()
    {
        $customerGroup = \Mage::getModel('Model\Admin\CustomerGroup');
        $query = "SELECT cg.*, pgp.productid,pgp.entityid,pgp.price as groupPrice,
		if(pgp.price IS NULL , '{$this->getTableRow()->price}' , p.price) price
		FROM `{$customerGroup->getTableName()}` cg
		LEFT JOIN `product_group_price` pgp
			ON pgp.customerGroupid = cg.id
				AND pgp.productid = '{$this->getTableRow()->id}'
		LEFT JOIN product p
				ON pgp.productid = p.id
		";
        return $customerGroup->fetchAll($query);

    }

}
<?php
namespace Model\Admin;

\Mage::loadFileByClassName('Model\Core\Table');
class Category extends \Model\Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function __construct()
    {

        $this->setPrimaryKey("id");
        $this->setTableName("category");
    }
    public function getStatusOptions()
    {
        return [

            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable',

        ];
    }
    public function updatePathId()
    {
        if (!$this->parentid) {
            $pathid = $this->id;
        } else {
            $parent = \Mage::getModel('Model\Admin\Category')->load($this->parentid);
            $pathid = $parent->pathid . "=>" . $this->id;
        }
        $this->pathid = $pathid;
        return $this->save();
    }
    public function updateChildrenPathIds($categoryPathId, $parentId = null)
    {
        $query = "SELECT * FROM `category` WHERE `pathid` LIKE '{$categoryPathId}%'";
        $categories = $this->getAdapter()->fetchAll($query);
        foreach ($categories as $key => $row) {
            $row = \Mage::getModel('Model\Admin\Category')->load($row['id']);
            if ($parentId) {
                $row->parentid = $parentId;
            }
            $row->updatePathId();
        }

    }
}
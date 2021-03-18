<?php
namespace Block\Admin\Category;

\Mage::loadFileByClassName('Block\Core\Template');
class Grid extends \Block\Core\Template
{
    public $categories = null;
    public $categoryOptions = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/category/grid.php');
    }
    public function setCategories(\Model\Admin\Category $categories)
    {
        $this->categories = $categories->fetchAll();
        return $this;
    }
    public function getCategories()
    {
        return $this->categories;
    }
    public function getName($category)
    {
        $categoryModel = \Mage::getModel('Model\Admin\Category');
        if (!$this->categoryOptions) {
            $query = "SELECT `id`,`name` FROM `{$categoryModel->getTableName()}`;";
            $this->categoryOptions = $categoryModel->getAdapter()->fetchPairs($query);
        }
        $pathids = explode("=>", $category->pathid);
        foreach ($pathids as $key => &$id) {
            if (array_key_exists($id, $this->categoryOptions)) {
                $id = $this->categoryOptions[$id];
            }
        }
        $name = implode("=>", $pathids);
        return $name;
    }

}
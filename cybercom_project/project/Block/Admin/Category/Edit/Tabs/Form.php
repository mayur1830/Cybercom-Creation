<?php
namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    public $category = null;
    public $categoryOptions = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/category/edit/tabs/form.php');
    }
    public function setCategory(\Model\Admin\Category $category)
    {
        $this->category = $category;
        return $this;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getOptions()
    {
        return $this->category->getStatusOptions();
    }
    public function getTitle()
    {
        if ($this->category->id) {
            return 'Edit Category';
        } else {
            return 'Add Category';
        }

    }
    public function getCategoryOptions()
    {
        if (!$this->categoryOptions) {
            $query = "SELECT `id`,`name` FROM `{$this->getCategory()->getTableName()}`;";
            $Options = $this->getCategory()->getAdapter()->fetchPairs($query);
            $query = "SELECT `id`,`pathid` FROM `{$this->getCategory()->getTableName()}`;";
            $this->categoryOptions = $this->getCategory()->getAdapter()->fetchPairs($query);
            foreach ($this->categoryOptions as $id => &$pathid) {
                $pathids = explode("=>", $pathid);
                foreach ($pathids as $key => &$id) {
                    if (array_key_exists($id, $Options)) {
                        $id = $Options[$id];
                    }
                }
                $pathid = implode("=>", $pathids);
            }
            $this->categoryOptions = ['0' => 'select'] + $this->categoryOptions;
        }
        return $this->categoryOptions;
    }

}
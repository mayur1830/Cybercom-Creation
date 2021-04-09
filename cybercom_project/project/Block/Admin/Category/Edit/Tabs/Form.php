<?php
namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    public $categoryOptions = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/category/edit/tabs/form.php');
    }
    public function getTitle()
    {
        return 'Add/Edit Category';

    }
    public function getCategoryOptions()
    {
        if (!$this->categoryOptions) {
            $query = "SELECT `id`,`name` FROM `{$this->getTableRow()->getTableName()}`;";
            $Options = $this->getTableRow()->getAdapter()->fetchPairs($query);
            $query = "SELECT `id`,`pathid` FROM `{$this->getTableRow()->getTableName()}`;";
            $this->categoryOptions = $this->getTableRow()->getAdapter()->fetchPairs($query);
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
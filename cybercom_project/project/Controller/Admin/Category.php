<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Category extends \Controller\Core\Admin
{
    protected $modelCategory = null;
    public function __construct()
    {
        parent::__construct();
        $this->setModelCategory();
    }
    public function setModelCategory($category = null)
    {
        if (!$category) {
            $category = \Mage::getModel('Model\Admin\Category');
        }
        $this->modelCategory = $category;
        return $this;
    }
    public function getModelCategory()
    {
        if (!$this->modelCategory) {
            $this->setModelCategory();
        }
        return $this->modelCategory;
    }
    public function gridAction()
    {
        try {
            $grid = \Mage::getBlock('Block\Admin\Category\Grid');
            $grid->setCategories(\Mage::getModel('Model\Admin\Category'));
            $this->getLayout()->getChild('content')->addChild($grid, 'grid');
            $this->renderLayout();
        } catch (\Exception $e) {
            echo $e->getMessage();
            $this->redirect('grid', null, [], true);
        }

    }
    public function formAction()
    {
        try {
            $category = \Mage::getModel('Model\Admin\Category');
            if ($id = (int) $this->getRequest()->getGet('id')) {
                $category = $category->load($id);
                if (!$category) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Category\Edit')->setCategory($category);
            $leftcontent = \Mage::getBlock('Block\Admin\Category\Edit\Tabs');
            $this->getLayout()->getChild('content')->addChild($edit, 'edit');
            $this->getLayout()->getChild('left')->addChild($leftcontent, 'tab');
            $this->renderLayout();

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function saveAction()
    {
        try {
            $cat = \Mage::getModel('Model\Admin\Category');
            if ($id = $this->getRequest()->getGet('id')) {
                $cat = $cat->load($id);
                if (!$cat) {
                    throw new \Exception('Please Enter Valid ID');
                }

                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {

                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $categoryPathId = $cat->pathid . "=>";
            $categoryData = $this->getRequest()->getPost('category');
            $cat->setData($categoryData);
            $cat->save();
            $cat->updatePathId();
            $cat->updateChildrenPathIds($categoryPathId);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, [], true);
        }
        $this->redirect('grid', null, [], true);
    }

    public function deleteAction()
    {
        try {

            $id = $this->getRequest()->getGet('id');
            if (!(int) $id) {
                throw new \Exception('Invalid ID');
            }
            $category = \Mage::getBlock('Model\Admin\Category');
            $category->load($id);
            $parentId = $category->parentid;
            $pathId = $category->pathid . "=>";
            $category->updateChildrenPathIds($pathId, $parentId);
            if (!$this->getModelCategory()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, [], true);
    }
}
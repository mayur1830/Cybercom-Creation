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
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Category\Grid')->setCategories(\Mage::getModel('Model\Admin\Category'))->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $gridHtml,
                ],
                [
                    'selector' => '#leftHtml',
                    'html' => null,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
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
            $edit = \Mage::getBlock('Block\Admin\Category\Edit')->setTableRow($category)->toHtml();
            $leftcontent = \Mage::getBlock('Block\Admin\Category\Edit\Tabs')->toHtml();
            $response = [
                'status' => 'success',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $edit,
                    ],
                    [
                        'selector' => '#leftHtml',
                        'html' => $leftcontent,
                    ],
                ],
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
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
            $this->gridHtmlAction();

        }
        $this->gridHtmlAction();
    }

    public function deleteAction()
    {
        try {
            $category = \Mage::getBlock('Model\Admin\Category');
            $id = $this->getRequest()->getGet('id');
            if (!(int) $id) {
                throw new \Exception('Invalid ID');
            }
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
        $this->gridHtmlAction();
    }
}
<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class CmsPage extends \Controller\Core\Admin
{
    protected $modelCmsPage = null;
    public function __construct()
    {
        parent::__construct();
        $this->setModelCmsPage();
    }
    public function setModelCmsPage($cmsPage = null)
    {
        if (!$cmsPage) {
            $cmsPage = \Mage::getModel('Model\Admin\CmsPage');
        }
        $this->modelCmsPage = $cmsPage;
        return $this;
    }
    public function getModelCmsPage()
    {
        if (!$this->modelCmsPage) {
            $this->setModelCmsPage();
        }
        return $this->modelCmsPage;
    }
    public function gridAction()
    {
        try {
            $grid = \Mage::getBlock('Block\Admin\CmsPage\Grid');
            $grid->setCmsPages(\Mage::getModel('Model\Admin\CmsPage'));
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
            $cmsPage = \Mage::getModel('Model\Admin\CmsPage');
            if ($id = (int) $this->getRequest()->getGet('id')) {
                $cmsPage = $cmsPage->load($id);
                if (!$cmsPage) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\CmsPage\Edit')->setCmsPage($cmsPage);
            $leftcontent = \Mage::getBlock('Block\Admin\CmsPage\Edit\Tabs');
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

            if ($id = $this->getRequest()->getGet('id')) {
                $cmsPage = $this->getModelCmsPage()->load($id);
                if (!$cmsPage) {
                    throw new \Exception('Please Enter Valid ID');
                }
                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {
                $this->getModelCmsPage()->createdDate = date('Y-m-d H-i-s');
                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $cmsPageData = $this->getRequest()->getPost('cmsPage');
            $this->getModelCmsPage()->setData($cmsPageData);
            $this->getModelCmsPage()->save();

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
            if (!$this->getModelCmsPage()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, [], true);
    }
}
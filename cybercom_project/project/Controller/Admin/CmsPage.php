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
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\CmsPage\Grid')->setCmsPages(\Mage::getModel('Model\Admin\CmsPage'))->toHtml();
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
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $left = $layout->getChild('left');
        echo $layout->toHtml();
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
            $edit = \Mage::getBlock('Block\Admin\CmsPage\Edit')->setTableRow($cmsPage)->toHtml();
            $leftcontent = \Mage::getBlock('Block\Admin\CmsPage\Edit\Tabs')->toHtml();
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
            $this->gridHtmlAction();

        }

        $this->gridHtmlAction();

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
        $this->gridHtmlAction();

    }
}
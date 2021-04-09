<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Admin extends \Controller\Core\Admin
{
    protected $modelAdmin = null;
    public function __construct()
    {
        parent::__construct();
        $this->setModelAdmin();
    }
    public function setModelAdmin($admin = null)
    {
        if (!$admin) {
            $admin = \Mage::getModel('Model\Admin\Admin');
        }
        $this->modelAdmin = $admin;
        return $this;
    }
    public function getModelAdmin()
    {
        if (!$this->modelAdmin) {
            $this->setModelAdmin();
        }
        return $this->modelAdmin;
    }
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Admin\Grid')->setAdmins(\Mage::getModel('Model\Admin\Admin'))->toHtml();
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
            $admin = \Mage::getModel('Model\Admin\Admin');
            if ($id = (int) $this->getRequest()->getGet('id')) {
                $admin = $admin->load($id);
                if (!$admin) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Admin\Edit')->setTableRow($admin)->toHtml();
            $leftcontent = \Mage::getBlock('Block\Admin\Admin\Edit\Tabs')->toHtml();
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
                $admin = $this->getModelAdmin()->load($id);
                if (!$admin) {
                    throw new \Exception('Please Enter Valid ID');
                }
                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {
                $this->getModelAdmin()->createdDate = date('Y-m-d H-i-s');

                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $adminData = $this->getRequest()->getPost('admin');
            $this->getModelAdmin()->setData($adminData);
            $this->getModelAdmin()->save();

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
            if (!$this->getModelAdmin()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();

    }
}
<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class ConfigGroup extends \Controller\Core\Admin
{
    protected $modelConfigGroup = null;
    public function __construct()
    {
        parent::__construct();
        $this->setModelConfigGroup();
    }
    public function setModelConfigGroup($configGroup = null)
    {
        if (!$configGroup) {
            $configGroup = \Mage::getModel('Model\Admin\ConfigGroup');
        }
        $this->modelConfigGroup = $configGroup;
        return $this;
    }
    public function getModelConfigGroup()
    {
        if (!$this->modelConfigGroup) {
            $this->setModelConfigGroup();
        }
        return $this->modelConfigGroup;
    }
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\ConfigGroup\Grid')->setConfigGroups(\Mage::getModel('Model\Admin\ConfigGroup'))->toHtml();
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
            $configGroup = \Mage::getModel('Model\Admin\ConfigGroup');
            if ($id = (int) $this->getRequest()->getGet('id')) {
                $configGroup = $configGroup->load($id);
                if (!$configGroup) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\ConfigGroup\Edit')->setTableRow($configGroup)->toHtml();
            $leftcontent = \Mage::getBlock('Block\Admin\ConfigGroup\Edit\Tabs')->toHtml();
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
                $configGroup = $this->getModelConfigGroup()->load($id);
                if (!$configGroup) {
                    throw new \Exception('Please Enter Valid ID');
                }
                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {
                $this->getModelConfigGroup()->createdDate = date('Y-m-d H-i-s');

                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $configGroupData = $this->getRequest()->getPost('configgroup');
            $this->getModelConfigGroup()->setData($configGroupData);
            $this->getModelConfigGroup()->save();

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, [], true);
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
            if (!$this->getModelConfigGroup()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();

    }
}
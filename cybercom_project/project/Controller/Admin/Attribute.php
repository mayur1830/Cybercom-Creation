<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Attribute extends \Controller\Core\Admin
{
    protected $modelAttribute = null;
    public function __construct()
    {
        parent::__construct();
        $this->setModelAttribute();
    }
    public function setModelAttribute($attribute = null)
    {
        if (!$attribute) {
            $attribute = \Mage::getModel('Model\Admin\Attribute');
        }
        $this->modelAttribute = $attribute;
        return $this;
    }
    public function getModelAttribute()
    {
        if (!$this->modelAttribute) {
            $this->setModelAttribute();
        }
        return $this->modelAttribute;
    }
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Attribute\Grid')->setAttributes(\Mage::getModel('Model\Admin\Attribute'))->toHtml();
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
            $attribute = \Mage::getModel('Model\Admin\Attribute');
            if ($id = (int) $this->getRequest()->getGet('id')) {
                $attribute = $attribute->load($id);
                if (!$attribute) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Attribute\Edit')->setTableRow($attribute)->toHtml();
            $response = [
                'status' => 'success',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $edit,
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
                $product = $this->getModelAttribute()->load($id);
                if (!$product) {
                    throw new \Exception('Please Enter Valid ID');
                }
                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {
                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $attributeData = $this->getRequest()->getPost('attribute');
            $this->getModelAttribute()->setData($attributeData);
            $this->getModelAttribute()->save();
            if ($this->getModelAttribute()->backendType == 'varchar') {
                $backendType = $this->getModelAttribute()->backendType . '(255)';
            } else {
                $backendType = $this->getModelAttribute()->backendType;
            }
            $query = "ALTER TABLE `{$this->getModelAttribute()->entityId}` ADD {$this->getModelAttribute()->code} {$backendType}";
            $this->getModelAttribute()->getAdapter()->getConnect()->query($query);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
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
            if (!$this->getModelAttribute()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();
    }
}
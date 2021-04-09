<?php
namespace Controller\Admin\Attribute;

\Mage::loadFileByClassName('Controller\core\Admin');
class Option extends \Controller\Core\Admin
{

    public function gridHtmlAction()
    {
        $attribute = \Mage::getModel('Model\Admin\Attribute');
        if ($id = $this->getRequest()->getGet('id')) {
            $attribute = $attribute->load($id);
            if (!$attribute) {
                throw new \Exception("No record Found");
            }
        }

        $form = \Mage::getBlock('Block\Admin\Attribute\Edit')->setTableRow($attribute)->toHtml();
        $response = [
            'status' => 'success',
            'elements' => [
                [
                    'selecter' => '#contentHtml',
                    'html' => $form,
                ],
            ],
        ];
        header("Content-type:application/json");
        echo json_encode($response);
    }
    public function saveAction()
    {
        try {

            $optionData = $this->getRequest()->getPost();

            if (array_key_exists('new', $optionData)) {
                foreach ($optionData['new'] as $key => $option) {
                    $attributeOption = \Mage::getModel('Model\Admin\Attribute\Option');
                    $attributeOption->name = $option['name'];
                    $attributeOption->sortOrder = $option['sortOrder'];
                    $attributeOption->attributeId = $this->getRequest()->getGet('id');
                    $attributeOption->save();
                }
            }

            if (array_key_exists('exist', $optionData)) {
                foreach ($optionData['exist'] as $optionId => $option) {
                    $attributeOption = \Mage::getModel('Model\Admin\Attribute\Option');
                    $attributeOption->load($optionId);
                    $attributeOption->name = $option['name'];
                    $attributeOption->sortOrder = $option['sortOrder'];
                    $attributeOption->save();
                }
            }

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();

    }
}
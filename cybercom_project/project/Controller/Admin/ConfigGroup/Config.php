<?php
namespace Controller\Admin\ConfigGroup;

\Mage::loadFileByClassName('Controller\core\Admin');
class Config extends \Controller\Core\Admin
{

    public function gridHtmlAction()
    {
        $config = \Mage::getModel('Model\Admin\ConfigGroup');
        if ($id = $this->getRequest()->getGet('id')) {
            $config = $config->load($id);
            if (!$config) {
                throw new \Exception("No record Found");
            }
        }

        $form = \Mage::getBlock('Block\Admin\ConfigGroup\Edit')->setTableRow($config)->toHtml();
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

            $configData = $this->getRequest()->getPost();
            if (array_key_exists('new', $configData)) {
                foreach ($configData['new'] as $config) {
                    $c = \Mage::getModel('Model\Admin\ConfigGroup\Config');
                    $c->title = $config['title'];
                    $c->code = $config['code'];
                    $c->value = $config['value'];
                    $c->createdDate = date('Y:m:d H:i:s');
                    $c->groupId = $this->getRequest()->getGet('id');
                    $c->save();
                }
            }

            if (array_key_exists('exist', $configData)) {
                foreach ($configData['exist'] as $configId => $config) {
                    $c = \Mage::getModel('Model\Admin\ConfigGroup\Config');
                    $c->load($configId);
                    $c->title = $config['title'];
                    $c->code = $config['code'];
                    $c->value = $config['value'];
                    $c->save();
                }
            }

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();

    }
    public function deleteAction()
    {
        $config = \Mage::getModel('Model\Admin\ConfigGroup\Config');

        $data = array_keys($this->getRequest()->getPost('delete'));
        foreach ($data as $value) {
            $config->delete($value);
        }
        $this->gridHtmlAction();

    }
}
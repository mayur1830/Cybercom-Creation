<?php
namespace Controller\Admin\Product;

\Mage::loadFileByClassName('Controller\Core\Admin');

class GroupPrice extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Product\Edit')->toHtml();
        $tabHtml = \Mage::getBlock('Block\Admin\Product\Edit\Tabs')->toHtml();
        $response = [
            'status' => 'success',
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $gridHtml,
                ],
                [
                    'selector' => '#leftHtml',
                    'html' => $tabHtml,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }
    public function saveAction()
    {
        try {
            $groupData = $this->getRequest()->getPost('groupPrice');
            $productId = $this->getRequest()->getGet('id');
            foreach ($groupData['exist'] as $groupId => $price) {
                $query = "SELECT * FROM `product_group_price`
			WHERE `productid` = '{$productId}'
			AND `customerGroupid` = '{$groupId}';";
                $groupPrice = \Mage::getModel('Model\Admin\Product\GroupPrice');
                $groupPrice->fetchRow($query);
                $groupPrice->price = $price;
                $groupPrice->save();
            }

            foreach ($groupData['new'] as $groupId => $price) {
                $groupPrice = \Mage::getModel('Model\Admin\Product\GroupPrice');
                $groupPrice->customerGroupid = $groupId;
                $groupPrice->productid = $productId;
                $groupPrice->price = $price;
                $groupPrice->save();

            }
        } catch (\Exception $e) {

        }
        $this->gridHtmlAction();

        //$this->redirect('form', 'Admin_Product', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'groupPrice']);

    }

}
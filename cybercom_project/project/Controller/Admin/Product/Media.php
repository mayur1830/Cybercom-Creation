<?php
namespace Controller\Admin\Product;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Media extends \Controller\Core\Admin
{

    public function gridHtmlAction()
    {
        $product = \Mage::getModel('Model\Admin\Product');
        if ($id = (int) $this->getRequest()->getGet('id')) {
            $product = $product->load($id);
            if (!$product) {
                throw new \Exception("no record found");
            }
        }
        $gridHtml = \Mage::getBlock('Block\Admin\Product\Edit')->setTableRow($product)->toHtml();
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
            $productMedia = \Mage::getModel('Model\Admin\Product\Media');
            if ($_FILES) {
                if (!$_FILES['image']['error']) {
                    $path = "skin/admin/image/product/";
                    $imageFileName = $_FILES['image']['name'];
                    $tmpName = $_FILES['image']['tmp_name'];
                    move_uploaded_file($tmpName, $path . $imageFileName);
                    $productMedia->productid = $this->getRequest()->getGet('id');
                    $productMedia->image = $imageFileName;
                    $productMedia->save();
                }
            } else {

                $default = ['small' => 0, 'thumb' => 0, 'base' => 0, 'gallery' => 0];
                foreach ($this->getRequest()->getPost('data') as $key => $value) {
                    if (is_array($value)) {
                        $media = $productMedia->load($key);
                        $media->setData($default);
                        $media->setData($value);
                        $media->save();
                    } else {
                        $media = $productMedia->load($value);
                        $media->$key = $value;
                        $media->save();
                    }

                }
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }

        $this->gridHtmlAction();

    }
    public function deleteAction()
    {

        try {
            $path = "skin/admin/image/product/";
            $productMedia = \Mage::getModel('Model\Admin\Product\Media');
            $mediaIds = $this->getRequest()->getPost('id');
            foreach ($mediaIds as $value) {
                $query = "SELECT `image` FROM `product_media` WHERE  `id`={$value}";
                $image = $productMedia->fetchRow($query);
                echo $path . $image->image;
                unlink($path . $image->image);
                $productMedia->delete($value);
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }

    }

}
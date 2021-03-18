<?php
namespace Controller\Admin\Product;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Media extends \Controller\Core\Admin
{

    public function saveAction()
    {
        try {
            $productMedia = \Mage::getModel('Model\Admin\Product\Media');
            if (!$_FILES['image']['error']) {
                $path = "skin/admin/image/product/";
                $imageFileName = $_FILES['image']['name'];
                $tmpName = $_FILES['image']['tmp_name'];
                move_uploaded_file($tmpName, $path . $imageFileName);
                $productMedia->productid = $this->getRequest()->getGet('id');
                $productMedia->image = $imageFileName;
                $productMedia->save();
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
            $this->redirect('grid', 'Admin_Product', [], true);
        }
        $this->redirect('form', 'Admin_Product', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'media']);

    }
    public function deleteAction()
    {
        try {
            $path = "skin/admin/image/product/";
            $productMedia = \Mage::getModel('Model\Admin\Product\Media');
            $mediaIds = $this->getRequest()->getPost('imageIds');
            foreach ($mediaIds as $id => $value) {
                $query = "SELECT `image` FROM `product_media` WHERE  `id`={$id}";
                $image = $productMedia->fetchRow($query);
                unlink($path . $image->image);
                $productMedia->delete($id);
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', 'Admin_Product', [], true);
        }

        $this->redirect('form', 'Admin_Product', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'media']);

    }

}
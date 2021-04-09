<?php
namespace Block\Core\Edit;

\Mage::loadFileByClassName('Block\Core\Template');
class Tabs extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View\core\edit\tabs.php');
    }
}
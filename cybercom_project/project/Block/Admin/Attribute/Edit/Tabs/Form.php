<?php
namespace Block\Admin\Attribute\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    protected $tableRow = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/attribute/edit/tabs/form.php');
    }
    public function getTitle()
    {
        return 'Add/Edit Attribute';

    }
}
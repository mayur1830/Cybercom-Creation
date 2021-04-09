<?php

namespace Controller\Admin;

\mage::getController('Controller\Core\Admin');

class Dashboard extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $dashboard = \Mage::getBlock('Block\Admin\Dashboard\Index');
        $this->getLayout()->getChild('content')->addChild($dashboard, 'dashboard');
        $this->renderLayout();
    }
}
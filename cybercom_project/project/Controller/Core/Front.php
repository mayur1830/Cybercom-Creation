<?php
namespace Controller\Core;

class Front
{

    public static function init()
    {
        $request = \Mage::getModel('Model\Core\Request');
        $actionName = $request->getActionName() . 'Action';
        $controllerName = ucfirst($request->getControllerName());
        $controllerClassName = \Mage::prepareClassName('Controller', $controllerName);
        $controller = \Mage::getController($controllerClassName);
        $controller->$actionName();

    }

}
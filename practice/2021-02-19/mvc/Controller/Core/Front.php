<?php
require_once "./Model/Core/Request.php";
class Front
{
    public static function init()
    {
        $request = new Request();
        $controllerName = ucfirst($request->getGet('c'));
        $actionName = $request->getGet('a') . "Action";
        // echo $actionName;
        // echo $controllerName . "<br>";
        require_once "./Controller/{$controllerName}.php";
        $controller = new $controllerName();
        $controller->$actionName();
    }
}
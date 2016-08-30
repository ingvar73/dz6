<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 30.08.2016
 * Time: 15:53
 */
class Routing
{
    static function execute(){
        $controllerName = 'Main';
        $actionName = 'index';
        $pieceOfUrl = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($pieceOfUrl[1])){
            $controllerName = $pieceOfUrl[1];
        }
        if (!empty($pieceOfUrl[2])){
            $actionName = $pieceOfUrl[2];
        }

        $modelName = 'Model_'.$controllerName;
        $controllerName = 'Controller_'.$controllerName;
        $actionName = 'action_'.$actionName;
        $fileWithModel = strtolower($modelName).'.php';
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 28.08.2016
 * Time: 22:18
 */
class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include ($routesPath);
    }

    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * Returns request string
     */
    public function run()
    {
        // получить строку запроса
        $uri = $this->getURI();

        // проверка наличия запроса в routes.php
        foreach ($this->routes as $uriPattern => $path){
            // сравниваем $uriPattern с $uri
            if(preg_match("~$uriPattern~", $uri)){

                // Получаем внутренний путь из внешнего согласно правила
                $internalPath = preg_replace("~$uriPattern~", $path, $uri);

                // если есть совпадение, определить какой контроллер
                // и action  обрабатывают запрос
                $segments = explode('/', $internalPath);

               $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                echo '<br />ControllerName: '.$controllerName;
                echo '<br />ActionName: '.$actionName;
                $parameters = $segments;
                echo '<pre>';
                print_r($parameters);// отладочная информация

                // подключить файл класс-контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if(file_exists($controllerFile)){
                    include_once ($controllerFile);
                }
                // создать объект, вызвать метод (action)
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
//                $result = $controllerObject->$actionName();

                if ($result != null){
                    break;
                }
            }
        }

    }
}
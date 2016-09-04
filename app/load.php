<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 30.08.2016
 * Time: 15:49
 */
require_once 'core/routing.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once '/vendor/autoload.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('index.html');
echo $template->render(array());
// запуск роутинга
Routing::execute();


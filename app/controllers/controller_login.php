<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 30.08.2016
 * Time: 23:47
 */
class Controller_Login extends Controller
{
    public function action_index()
    {
        $this->view->generate('Страница Входа', 'login.php');
    }
}
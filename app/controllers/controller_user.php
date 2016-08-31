<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 30.08.2016
 * Time: 23:49
 */
class Controller_User extends Controller
{
    public function action_index()
    {
        $this->view->generate('Страница пользователя', 'user.php');
    }
}
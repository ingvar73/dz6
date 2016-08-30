<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 30.08.2016
 * Time: 23:11
 */
class Controller_Registration extends Controller
{
    public function action_index()
    {
        $this->view->generate('Страница регистрации', 'registration.php');
    }
}
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
		$this->view->generate('user_view.php', 'template_view.php', $data = $_COOKIE['login']);
    }
}
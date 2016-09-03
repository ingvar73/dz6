<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 30.08.2016
 * Time: 23:47
 */
include_once(ROOT . '/app/models/model_login.php');
include_once(ROOT . '/app/models/redirect.php');

class Controller_Login extends Controller
{
	public function __construct()
	{
		$this->model = new Model_Login();
		$this->view = new View();
	}


	public function action_index()
    {
//    	$data = $this->model->get_data();
		$this->view->generate('login_view.php', 'template_view.php');
    }
}
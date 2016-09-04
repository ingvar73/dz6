<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 30.08.2016
 * Time: 23:49
 */
include_once(ROOT.'/app/models/model_user.php');
include_once(ROOT.'/app/models/model_validate.php');
include_once(ROOT.'/app/models/model_redirect.php');

class Controller_User extends Controller
{
	public function __construct()
	{
		session_start();
		$this->model = new Model_User();
		$this->view = new View();
	}

	public function action_index()
    {
    	$data = $this->model->action_index();
//		var_dump($data);

			$this->view->generate('user_view.php', 'template_view.php', $data);
		}
}
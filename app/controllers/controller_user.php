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
	public $myrow;

	public function __construct()
	{
		session_start();
		$this->model = new Model_User();
		$this->view = new View();
	}

	public function action_index()
    {
//    	$data = $this->model->get_data();

		include_once (ROOT.'/components/db.php');
		if    (!empty($_SESSION['login']) and !empty($_SESSION['password']))
		{
			//если существует логин и пароль в сессиях, то проверяем их и извлекаем аватар

			$login = $_SESSION['login'];
			$password = $_SESSION['password'];
			$result_sql = "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'";
			$result = $mysql->query($result_sql) or die("ERROR: ".$mysql->error);
			$myrow = $result->fetch_array(MYSQLI_ASSOC);
    var_dump($myrow);
			//извлекаем нужные данные о пользователе
			$this->view->generate('user_view.php', 'template_view.php', $myrow);
		}
    }
}
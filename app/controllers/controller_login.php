<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 30.08.2016
 * Time: 23:47
 */
include_once(ROOT . '/app/models/model_user.php');
include_once(ROOT . '/app/models/model_redirect.php');
include_once(ROOT . '/app/models/model_auth.php');

class Controller_Login extends Controller
{
	public $mysql;

	public function action_index()
	{
		$this->view->generate('login_view.php', 'template_view.php');
	}

	public function action_log()
	{
//		$this->model = new Model_Auth();
		$this->view = new View();

		if (isset($_POST['enter'])) {
			session_start();
			include_once (ROOT.'/components/db.php');

			$data = new Model_Auth($_POST['login'], $_POST['password']);

			if ($data->result == true) {
				$login = htmlentities(strip_tags(trim($_POST['login'])), ENT_QUOTES);
				$pass = strip_tags(trim($_POST['password']));
//    проверяем логин и пароль на совпадение
				$sql = "SELECT login, password FROM users WHERE  login = '".$login."' AND password = '".$pass."' LIMIT 1";
				$result = $mysql->query($sql) or die("ERROR: ".$mysql->error);
				$value = $result->num_rows;
				if ($value > 0){

					print ("Пользователь авторизован!");
					$_SESSION["login"] = $login;
					$_SESSION["password"] = $pass;
					if(isset($_POST['login'])) {
						$_COOKIE['login'] = $_SESSION["login"];
					} else {
						unset($_COOKIE['login']);
					}
					Model_Redirect::redirectToPage('user/');
				} else {
					echo '<div style="background-color: lightblue; color: green;">Пользователь не зарегистрирован или пароль введен неверно!</div><hr />';
					echo '<a href="/">На главную</a>';
//					Model_Redirect::redirectToPage('/');
				}
			}
		}
	}
}
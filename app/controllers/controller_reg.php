<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 30.08.2016
 * Time: 23:11
 */

include_once(ROOT.'/app/models/model_user.php');
include_once(ROOT.'/app/models/model_validate.php');
include_once(ROOT.'/app/models/model_redirect.php');

class Controller_Reg extends Controller
{
public $dir;
public $pattern_img;
public $pattern_gif;
public $pattern_jpg;
public $pattern_png;
public $param;
	public $mysql;
	public $avatar;

    public function action_index()
    {
//		include_once (ROOT.'/components/db.php');
		$this->view->generate('reg_view.php', 'template_view.php');
    }

    public function action_reg()
	{
		$username = $_POST['login'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$about = $_POST['about'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];

		if (isset($_POST['enter'])) {
			session_start();
			include_once (ROOT.'/components/db.php');
			$dir = 'uploads/';
			$pattern_img = '/[.](JPG)|(jpg)|(gif)|(GIF)|(png)|(PNG)$/';
			$pattern_gif = '/[.](GIF)|(gif)$/';
			$pattern_jpg = '/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/';
			$pattern_png = '/[.](PNG)|(png)$/';


			$data = new Model_Validate(
			$_POST['login'],
			$_POST['name'],
			$_POST['age'],
			$_POST['about'],
			$_POST['password'],
			$_POST['cpassword'],
			$_FILES['avatar']
		);

			if ($data->result == true){
//    echo "Пишем в базу!";
				$login = htmlentities(strip_tags(trim($_POST['login'])), ENT_QUOTES);
				$name = htmlentities(trim($_POST['name']), ENT_QUOTES);
				$age = (int)($_POST['age']);
				$about = htmlentities(strip_tags(trim($_POST['about'])), ENT_QUOTES);
				$pass = htmlentities(strip_tags(trim($_POST['password'])), ENT_QUOTES);
				if    (!empty($_POST['avatar'])) //проверяем, отправил    ли пользователь изображение
				{
					$avatar = $_POST['avatar'];    $avatar = trim($avatar);
					if ($avatar =='' or empty($avatar)) {
						unset($fupload);// если переменная $fupload пуста, то удаляем ее
					}
				}
				if    (!$data->ver_avatar($avatar) == false)
				{
					//если переменной не существует (пользователь не отправил    изображение),то присваиваем ему заранее приготовленную картинку с надписью    "нет аватара"
					$avatar    = "uploads/net-avatara.jpg"; //нарисовать net-avatara.jpg или взять в исходниках
				} else {
					// загружаем изображение пользователя
					// проверяем загружен ли аватар, елси нет то грузим пустой аватар
					if(preg_match($pattern_img, $_FILES['avatar']['name'])){
						$filename = $_FILES['avatar']['name'];
						$source = $_FILES['avatar']['tmp_name'];
						$target = $dir.$filename;
						move_uploaded_file($source, $target);
						if(preg_match($pattern_gif, $filename)){
							$im = imagecreatefromgif($dir.$filename); //создаем в формате GIF
						}
						if(preg_match($pattern_png, $filename)){
							$im = imagecreatefrompng($dir.$filename); //создаем в формате PNG
						}
						if(preg_match($pattern_jpg, $filename)){
							$im = imagecreatefromjpeg($dir.$filename); //создаем в формате JPG
						}
						// Создание изображение "Взято с сайта www.codenet.ru"
						$w = 150;
						$w_src = imagesx($im); //вычисляем ширину
						$h_src = imagesy($im); //вычисляем высоту
						$dest = imagecreatetruecolor($w, $w);
						if($w_src > $h_src)
							imagecopyresampled($dest, $im, 0, 0, round((max($w_src, $h_src) - min($w_src, $h_src))/2), 0, $w, $w, min($w_src, $h_src), min($w_src, $h_src));
						if($w_src < $h_src)
							imagecopyresampled($dest, $im, 0, 0,    0, 0, $w, $w, min($w_src,$h_src), min($w_src,$h_src));
						if($w_src == $h_src)
							imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src);
						$date = time();
						imagejpeg($dest, $dir.$date.".jpg");
						$avatar = $dir.$date.".jpg";
						$delfull = $dir.$filename;
						unlink($delfull);
					} else {
						exit("Автар или изображение должно быть в формате <strong>JPG, GIF или PNG</strong>");
					}
				}

//    проверяем логин на уникальность
				$query = "SELECT login FROM users WHERE  login = '".$login."' LIMIT 1";
				$result = $mysql->query($query) or die("ERROR: ".$mysql->error);
				$value = $result->num_rows;

				if ($value > 0){
					echo '<div style="background-color: lightcyan; color: red;">Ошибка регистрации, пользователь с таким логином существует!</div><hr />';
//					Model_Redirect::redirectToPage('index.php');
				} else {
					// регистрируем
					$sql = "INSERT INTO users (id, login, name, age, about, password, avatar) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
					if ($stmt = $mysql->prepare($sql)) {
						$stmt->bind_param('ssisss', $login, $name, $age, $about, $pass, $avatar);
						$stmt->execute();

						$stmt->close();
						$mysql->close();
						$_SESSION["login"] = $login;
						$_SESSION["password"] = $pass;
						print ('<div style="background-color: lightblue; color: green;">Вы успешно зарегистрированы!</div><hr />');
						Model_Redirect::redirectToPage('user/');
					}
				}
			} else {
				echo '<div style="background-color: lightcyan; color: red;">Ошибка записи данных, проверьте правильность заполнения!</div><hr />';
			}
		}
	}
}
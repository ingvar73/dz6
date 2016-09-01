<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 31.08.2016
 * Time: 3:53
 */

class Validate
{
	public function __construct () //Инициализируем методы
	{
		$result_login = $this->ver_login($login);
		$result_name = $this->ver_name($name);
		$result_age = $this->ver_age($age);
		$result_about = $this->ver_about($about);
		$result_pass = $this->ver_pass($pass, $pass1);
		$result_avatar = $this->ver_avatar($avatar);
		if($result_login and $result_name and $result_age and $result_about and $result_pass and $result_avatar){
			$this->result = true;
			return $this->result;
		} else{
			$this->result = false;
			return $this->result;
		}
	}
}
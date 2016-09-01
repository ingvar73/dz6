<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 31.08.2016
 * Time: 3:53
 */

class Model_Login extends Model
{
	private $login = '';
	private $name = '';
	private $age = 0;
	private $about = '';
	private $password = '';
	private $cpassword = '';

	public $data;
	public function __construct()
	{
		$this->data = $_POST;
		$this->model = new Model($this->data);
	}
	public function get_data()
	{

	}

	public function db_connect()
	{

	}
}
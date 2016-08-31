<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 29.08.2016
 * Time: 3:12
 */

$table_name = "gbook";
$host = "localhost";
$user = "mysql";
$pass = "";
$mysql = @new mysqli($host, $user, $pass, $table_name);
if(mysqli_connect_errno()){
    die(mysqli_connect_error());
}
$sql = "SET NAMES 'UTF8'";
$mysql->query($sql);


//class Db
//{
//    public static function getConnection(){
//        $paramsPath = ROOT.'/config/db_params.php';
//        $params = include ($paramsPath);
//
//        $dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";
//        $db = new PDO($dsn, $params['user'], $params['password']);
//        return $db;
//    }
//}
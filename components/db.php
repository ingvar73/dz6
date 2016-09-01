<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 29.08.2016
 * Time: 3:12
 */
class Db
{
    public static function getConnection(){
        $paramsPath = ROOT.'/config/db_params.php';
        $params = include ($paramsPath);

        $dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        return $db;
    }
}
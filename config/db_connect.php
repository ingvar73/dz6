<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 31.08.2016
 * Time: 14:48
 */
require ROOT."/app/components/db.php";
$db = DataBase::getDB();
if($db) echo "соединение установлено" or die("ошибка соединения!");
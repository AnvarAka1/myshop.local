<?php

$dblocation = "127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "";


$pdo = new PDO("mysql:host=$dblocation;dbname=$dbname", $dbuser, $dbpasswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if (!$pdo) {
    echo "Ошибка доступа к MySql";
    exit();
}
